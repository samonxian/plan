<?php

class ForumController extends BbiiController {
	public $poll;
	public $choiceProvider;
	public $voted;
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('createTopic', 'quote', 'reply', 'vote', 'displayVote', 'editPoll', 'updatePoll', 'update', 'upvote', 'markAllRead'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('error', 'index', 'forum', 'topic'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex() {
		unset(Yii::app()->user->BbiiTopic_page);
		$model = array();
		$categories = BbiiForum::model()->category()->sorted()->findAll();
		foreach($categories as $category) {
			if(Yii::app()->user->isGuest) {
				$forums = BbiiForum::model()->forum()->public()->membergroup()->sorted()->findAll("cat_id = $category->id");
			} elseif($this->isModerator()) {
				$forums = BbiiForum::model()->forum()->sorted()->findAll("cat_id = $category->id");
			} else {
				$groupId = BbiiMember::model()->findByPk(Yii::app()->user->id)->group_id;
				$forums = BbiiForum::model()->forum()->membergroup($groupId)->sorted()->findAll("cat_id = $category->id");
			}
			if(count($forums)) {
				$model[] = $category;
				foreach($forums as $forum) {
					$model[] = $forum;
				}
			}
		}
		$dataProvider=new CArrayDataProvider($model, array(
			'id'=>'forum',
			'pagination'=>false,
		));
		$this->render('index', array('dataProvider'=>$dataProvider));
	}
	
	public function actionMarkAllRead() {
		$topics = BbiiTopic::model()->findAll();
		foreach($topics as $topic) {
			$topicLog = BbiiLogTopic::model()->findByPk(array('member_id'=>Yii::app()->user->id, 'topic_id'=>$topic->id));
			if($topicLog === null) {
				$topicLog = new BbiiLogTopic;
				$topicLog->member_id = Yii::app()->user->id;
				$topicLog->topic_id = $topic->id;
				$topicLog->forum_id = $topic->forum_id;
			}
			$topicLog->last_post_id = $topic->last_post_id;
			$topicLog->save();
		}
		$this->redirect(array('index'));
	}
	
	/**
	 * Show forum with topics
	 */
	public function actionForum($id) {
		$forum = BbiiForum::model()->findByPk($id);
		if($forum === null) {
			throw new CHttpException(404, Yii::t('BbiiModule.bbii', 'The requested forum does not exist.'));
		}
		if(Yii::app()->user->isGuest && $forum->public == 0) {
			throw new CHttpException(403, Yii::t('BbiiModule.bbii', 'You have no permission to view requested forum.'));
		}
		if($forum->membergroup_id != 0) {
			if(Yii::app()->user->isGuest) {
				throw new CHttpException(403, Yii::t('BbiiModule.bbii', 'You have no permission to view requested forum.'));
			} elseif(!$this->isModerator()) {
				$groupId = BbiiMember::model()->findByPk(Yii::app()->user->id)->group_id;
				if($forum->membergroup_id != $groupId) {
					throw new CHttpException(403, Yii::t('BbiiModule.bbii', 'You have no permission to view requested forum.'));
				}
			}
		}
		if(isset($_GET['BbiiTopic_page']) && isset($_GET['ajax'])) {
            $topicPage = (int) $_GET['BbiiTopic_page'] - 1;
            Yii::app()->user->setState('BbiiTopic_page', $topicPage);
			Yii::app()->user->setState('BbiiForum_id', $id);
            unset($_GET['BbiiTopic_page']);
        } elseif(isset($_GET['ajax'])) {
            Yii::app()->user->setState('BbiiTopic_page', 0);
		} elseif(Yii::app()->user->hasState('BbiiForum_id') && Yii::app()->user->BbiiForum_id != $id) {
			unset(Yii::app()->user->BbiiForum_id);
			Yii::app()->user->setState('BbiiTopic_page', 0);
		}
		$dataProvider=new CActiveDataProvider('BbiiTopic', array(
			'criteria'=>array(
				'condition'=>'approved = 1 and (forum_id=' . $forum->id . ' or global = 1)',
				'order'=>'global DESC, sticky DESC, last_post_id DESC',
				'with'=>array('starter'),
			),
			'pagination'=>array(
				'pageSize'=>$this->module->topicsPerPage,
				'currentPage' => Yii::app()->user->getState('BbiiTopic_page', 0),
			),
		));
		$this->render('forum', array(
			'forum' => $forum,
			'dataProvider' => $dataProvider
		));
	}
	
	/**
	 * Show topic with posts
	 * @param $id integer topic_id
	 * @param $nav string post-id or "last"
	 */
	public function actionTopic($id, $nav = null, $postId = null) {
		$topic = BbiiTopic::model()->findByPk($id);
		if($topic === null) {
			throw new CHttpException(404, Yii::t('BbiiModule.bbii', 'The requested topic does not exist.'));
		}
		$forum = BbiiForum::model()->findByPk($topic->forum_id);
		if(Yii::app()->user->isGuest && $forum->public == 0) {
			throw new CHttpException(403, Yii::t('BbiiModule.bbii', 'You have no permission to read requested topic.'));
		}
		if($forum->membergroup_id != 0) {
			if(Yii::app()->user->isGuest) {
				throw new CHttpException(403, Yii::t('BbiiModule.bbii', 'You have no permission to read requested topic.'));
			} elseif(!$this->isModerator()) {
				$groupId = BbiiMember::model()->findByPk(Yii::app()->user->id)->group_id;
				if($forum->membergroup_id != $groupId) {
					throw new CHttpException(403, Yii::t('BbiiModule.bbii', 'You have no permission to read requested topic.'));
				}
			}
		}
		$dataProvider=new CActiveDataProvider('BbiiPost', array(
			'criteria'=>array(
				'condition'=>'approved = 1 and topic_id=' . $topic->id,
				'order'=>'t.id',
				'with'=>array('poster'),
			),
			'pagination'=>array(
				'pageSize'=>$this->module->postsPerPage,
			),
		));
		// Determine poll
		$criteria = new CDbCriteria;
		$criteria->condition = 'post_id = ' . $topic->first_post_id;
		$this->poll = BbiiPoll::model()->find($criteria);
		if($this->poll !== null) {
			$this->choiceProvider=new CActiveDataProvider('BbiiChoice', array(
				'criteria'=>array(
					'condition'=>'poll_id = ' . $this->poll->id,
					'order'=>'sort',
				),
				'pagination'=>false,
			));
			// Determine whether user has voted
			if(Yii::app()->user->isGuest) {
				$this->voted = true; // A guest may not vote and sees the result immediately
			} else {
				$criteria->condition = 'poll_id = ' . $this->poll->id . ' and user_id = ' . Yii::app()->user->id;
				$this->voted = BbiiVote::model()->exists($criteria);
			}
			// Determine wheter the poll has expired
			if(!$this->voted && isset($this->poll->expire_date) && $this->poll->expire_date < date('Y-m-d')) {
				$this->voted = true;
			}
		}
		// Navigate to a post in a topic
		if(isset($nav)) {
			$cPage = $dataProvider->getPagination();
			if(is_numeric($nav)) {
				$criteria->condition = 'topic_id = ' . $topic->id . ' and id <= ' . $nav . ' and approved = 1';
				$count = BbiiPost::model()->count($criteria);
				$page = ceil($count/$cPage->pageSize);
				$post = $nav;
			} else {
				$page = ceil($dataProvider->totalItemCount/$cPage->pageSize);
				$post = $topic->last_post_id;
			}
			if(Yii::app()->user->hasFlash('moderation')) {
				Yii::app()->user->setFlash('moderation', Yii::app()->user->getFlash('moderation'));
			}
			$this->redirect(array('topic', 'id'=>$id, 'BbiiPost_page'=>$page, 'postId'=>$post));;
		}
		// Increase topic views
		$topic->saveCounters(array('num_views'=>1));
		// Register the last visit of a topic
		if(!Yii::app()->user->isGuest) {
			$topicLog = BbiiLogTopic::model()->findByPk(array('member_id'=>Yii::app()->user->id, 'topic_id'=>$topic->id));
			if($topicLog === null) {
				$topicLog = new BbiiLogTopic;
				$topicLog->member_id = Yii::app()->user->id;
				$topicLog->topic_id = $topic->id;
				$topicLog->forum_id = $topic->forum_id;
			}
			$topicLog->last_post_id = $topic->last_post_id;
			$topicLog->save();
		}
		$this->render('topic', array(
			'forum' => $forum,
			'topic' => $topic,
			'dataProvider' => $dataProvider,
			'postId' => $postId,
		));
	}
	
	/**
	 * Quote the original post in the reply (reply to a post)
	 * @param $id integer post_id
	 */
	public function actionQuote($id) {
		$quoted = BbiiPost::model()->findByPk($id);
		if($quoted === null) {
			throw new CHttpException(404, Yii::t('BbiiModule.bbii', 'The requested post does not exist.'));
		}
		$forum = BbiiForum::model()->findByPk($quoted->forum_id);
		$topic = BbiiTopic::model()->findByPk($quoted->topic_id);
		if(isset($_POST['BbiiPost'])) {
			$post = new BbiiPost;
			$post->attributes = $_POST['BbiiPost'];
			$post->user_id = Yii::app()->user->id;
			if($forum->moderated) {
				$post->approved = 0;
			} else {
				$post->approved = 1;
			}
			if($post->save()) {
				if($post->approved) {
					$forum->saveCounters(array('num_posts'=>1));					// method since Yii 1.1.8
					$topic->saveCounters(array('num_replies'=>1));					// method since Yii 1.1.8
					$topic->saveAttributes(array('last_post_id'=>$post->id));
					$forum->saveAttributes(array('last_post_id'=>$post->id));
					$post->poster->saveCounters(array('posts'=>1));					// method since Yii 1.1.8
					$this->assignMembergroup(Yii::app()->user->id);
				} else {
					Yii::app()->user->setFlash('moderation',Yii::t('BbiiModule.bbii', 'Your post has been saved. It has been placed in a queue and is now waiting for approval by a moderator before it will appear on the forum. Thank you for your contribution to the forum.'));
				}
				$this->redirect(array('topic', 'id'=>$post->topic_id, 'nav'=>'last'));
			}
		} else {
			$post = new BbiiPost;
			$quote = $quoted->poster->member_name .' '. Yii::t('BbiiModule.bbii', 'wrote') .' '. Yii::t('BbiiModule.bbii', 'on') .' '. DateTimeCalculation::longDate($quoted->create_time);
			$post->content = '<blockquote cite="'. $quote .'"><p class="blockquote-header"><strong>'. $quote .'</strong></p>' . $quoted->content . '</blockquote><p></p>';
			$post->subject  = $quoted->subject;
			$post->forum_id = $quoted->forum_id;
			$post->topic_id = $quoted->topic_id;
		}
		$this->render('reply', array(
			'forum' => $forum,
			'topic' => $topic,
			'post' => $post
		));
	}
	
	/**
	 * Reply to a topic
	 * @param $id integer topic_id
	 */
	public function actionReply($id) {
		$topic = BbiiTopic::model()->findByPk($id);
		if($topic === null) {
			throw new CHttpException(404, Yii::t('BbiiModule.bbii', 'The requested topic does not exist.'));
		}
		$forum = BbiiForum::model()->findByPk($topic->forum_id);
		$post = new BbiiPost;
		if(isset($_POST['BbiiPost'])) {
			$post->attributes = $_POST['BbiiPost'];
			$post->user_id = Yii::app()->user->id;
			if($forum->moderated) {
				$post->approved = 0;
			} else {
				$post->approved = 1;
			}
			if($post->save()) {
				if($post->approved) {
					$forum->saveCounters(array('num_posts'=>1));					// method since Yii 1.1.8
					$topic->saveCounters(array('num_replies'=>1));					// method since Yii 1.1.8
					$topic->saveAttributes(array('last_post_id'=>$post->id));
					$forum->saveAttributes(array('last_post_id'=>$post->id));
					$post->poster->saveCounters(array('posts'=>1));					// method since Yii 1.1.8
					$this->assignMembergroup(Yii::app()->user->id);
				} else {
					Yii::app()->user->setFlash('moderation',Yii::t('BbiiModule.bbii', 'Your post has been saved. It has been placed in a queue and is now waiting for approval by a moderator before it will appear on the forum. Thank you for your contribution to the forum.'));
				}
				$this->redirect(array('topic', 'id'=>$post->topic_id, 'nav'=>'last'));
			}
		} else {
			$post->subject = $topic->title;
			$post->forum_id = $forum->id;
			$post->topic_id = $topic->id;
		}
		$this->render('reply', array(
			'forum' => $forum,
			'topic' => $topic,
			'post' => $post
		));
	}
	
	public function actionCreateTopic() {
		$post = new BbiiPost;
		$poll = new BbiiPoll;
		if(isset($_POST['BbiiForum'])) {
			$post->forum_id = $_POST['BbiiForum']['id'];
			$forum = BbiiForum::model()->findByPk($post->forum_id);
		}
		if(isset($_POST['choice'])) {
			$choiceArr = $_POST['choice'];
			while(count($choiceArr) < 3) {
				$choiceArr[] = '';
			}
		} else {
			$choiceArr = array('', '', '');
		}
		if(isset($_POST['BbiiPost'])) {
			$post->attributes = $_POST['BbiiPost'];
			$forum = BbiiForum::model()->findByPk($post->forum_id);
			if($forum->moderated) {
				$post->approved = 0;
			} else {
				$post->approved = 1;
			}
			if($post->save()) {
				// Topic
				$topic = new BbiiTopic;
				$topic->forum_id 		= $forum->id;
				$topic->title 			= $post->subject;
				$topic->first_post_id 	= $post->id;
				$topic->last_post_id 	= $post->id;
				$topic->approved 		= $post->approved;
				if(isset($_POST['sticky'])) { $topic->sticky = 1; }
				if(isset($_POST['global'])) { $topic->global = 1; }
				if(isset($_POST['locked'])) { $topic->locked = 1; }
				// Poll
				if(isset($_POST['BbiiPoll'])) {
					$poll->attributes = $_POST['BbiiPoll'];
					$poll->post_id = $post->id;
					$poll->user_id = Yii::app()->user->id;
					if(empty($poll->expire_date)) {
						unset($poll->expire_date);
					}
					$count = 0;
					$choices = $_POST['choice'];
					foreach($choices as $choice) {
						if(!empty($choice)) { $count++; }
					}
					if($poll->validate() && $count > 1) {
						$correct = true;
					} else {
						$correct = false;
						if($correct < 2) {
							$poll->addError('question', Yii::t('BbiiModule.bbii','A poll should have at least 2 choices.'));
						}
					}
				} else {
					$correct = true;
				}
				
				if($correct && $topic->save()) {
					$post->topic_id 	= $topic->id;
					$post->update();
					if(!$forum->moderated) {
						$forum->saveCounters(array('num_posts'=>1,'num_topics'=>1));	// method since Yii 1.1.8
						$post->poster->saveCounters(array('posts'=>1));					// method since Yii 1.1.8
						$forum->last_post_id = $post->id;
						$forum->update();
						$this->assignMembergroup(Yii::app()->user->id);
					} else {
						Yii::app()->user->setFlash('moderation',Yii::t('BbiiModule.bbii', 'Your post has been saved. It has been placed in a queue and is now waiting for approval by a moderator before it will appear on the forum. Thank you for your contribution to the forum.'));
					}
					if(isset($_POST['BbiiPoll'])) {
						$poll->save();
						$choices = $_POST['choice'];
						$i = 1;
						foreach($choices as $choice) {
							if(!empty($choice)) {
								$ch = new BbiiChoice;
								$ch->choice = $choice;
								$ch->poll_id = $poll->id;
								$ch->sort = $i++;
								$ch->save();
							}
						}
					}
					$this->redirect(array('topic', 'id'=>$topic->id));
				} else {
					$post->delete();
				}
			}
		}
		$this->render('create', array(
			'forum' => $forum,
			'post' => $post,
			'poll' => $poll,
			'choices' => $choiceArr,
		));
	}
	
	public function actionUpdate($id) {
		$post = BbiiPost::model()->findByPk($id);
		if($post === null) {
			throw new CHttpException(404, Yii::t('BbiiModule.bbii', 'The requested post does not exist.'));
		}
		if(($post->user_id != Yii::app()->user->id || $post->topic->locked) && !$this->isModerator()) {
			throw new CHttpException(403, Yii::t('yii', 'You are not authorized to perform this action.'));
		}
		$forum = BbiiForum::model()->findByPk($post->forum_id);
		$topic = BbiiTopic::model()->findByPk($post->topic_id);
		if(isset($_POST['BbiiPost'])) {
			$post->attributes = $_POST['BbiiPost'];
			$post->change_id = Yii::app()->user->id;
			if($forum->moderated) {
				$post->approved = 0;
			} else {
				$post->approved = 1;
			}
			if($post->save()) {
				if(!$post->approved) {
					$forum->saveCounters(array('num_posts'=>-1));					// method since Yii 1.1.8
					if($topic->num_replies > 0) {
						$topic->saveCounters(array('num_replies'=>-1));				// method since Yii 1.1.8
					} else {
						$topic->approved = 0;
						$topic->update();
						$forum->saveCounters(array('num_topics'=>-1));				// method since Yii 1.1.8
					}
					$post->poster->saveCounters(array('posts'=>-1));				// method since Yii 1.1.8
				}
				$this->redirect(array('topic', 'id'=>$post->topic_id));
			}
		}
		$this->render('update', array(
			'forum' => $forum,
			'topic' => $topic,
			'post' => $post
		));
	}
	
	public function actionUpdatePoll($id) {
		$poll = BbiiPoll::model()->findByPk($id);
		if($poll === null) {
			throw new CHttpException(404, Yii::t('BbiiModule.bbii', 'The requested poll does not exist.'));
		}
		$post = BbiiPost::model()->findByPk($poll->post_id);
		if($poll->user_id != Yii::app()->user->id && !$this->isModerator()) {
			throw new CHttpException(403, Yii::t('yii', 'You are not authorized to perform this action.'));
		}
		if(isset($_POST['BbiiPoll'])) {
			$poll->attributes = $_POST['BbiiPoll'];
			if(empty($poll->expire_date)) {
				unset($poll->expire_date);
			}
			if($poll->save()) {
				$choices = $_POST['choice'];
				foreach($choices as $key => $choice) {
					$ch = BbiiChoice::model()->findByPk($key);
					if($ch !== null) {
						$ch->choice = $choice;
						$ch->save();
					}
				}
			}
		}
		$this->redirect(array('topic', 'id'=>$post->topic_id));
	}
	
	/**
	 * Handle Ajax call for upvote/downvote of post
	 */
	public function actionUpvote() {
		$json = array();
		if(isset($_POST['id'])) {
			$criteria = new CDbCriteria;
			$criteria->condition = "member_id = :userid and post_id = :post_id";
			$criteria->params = array(':userid' => Yii::app()->user->id, ':post_id' => $_POST['id']);
			if(BbiiUpvoted::model()->exists($criteria)) {	// remove upvote
				BbiiUpvoted::model()->deleteAll($criteria);
				$post = BbiiPost::model()->findByPk($_POST['id']);
				$topic = BbiiTopic::model()->findByPk($post->topic_id);
				$member = BbiiMember::model()->findByPk($post->user_id);
				$post->saveCounters(array('upvoted'=>-1));
				$topic->saveCounters(array('upvoted'=>-1));
				$member->saveCounters(array('upvoted'=>-1));
			} else {										// add upvote
				$upvote = new BbiiUpvoted;
				$upvote->member_id = Yii::app()->user->id;
				$upvote->post_id = $_POST['id'];
				$upvote->save();
				$post = BbiiPost::model()->findByPk($_POST['id']);
				$topic = BbiiTopic::model()->findByPk($post->topic_id);
				$member = BbiiMember::model()->findByPk($post->user_id);
				$post->saveCounters(array('upvoted'=>1));
				$topic->saveCounters(array('upvoted'=>1));
				$member->saveCounters(array('upvoted'=>1));
			}
			$json['success'] = 'yes';
			$json['html'] = $this->showUpvote($_POST['id']);
		} else {
			$json['success'] = 'no';
		}
		echo json_encode($json);
		Yii::app()->end();
	}
	
	/**
	 * Handle Ajax call for voting
	 */
	public function actionVote() {
		$json = array();
		if(isset($_POST['poll_id'])) {
			$this->poll = BbiiPoll::model()->findByPk($_POST['poll_id']);
			if(isset($_POST['choice'])) {
				// In case of a revote: remove previous votes
				$criteria = new CDbCriteria;
				$criteria->condition = 'poll_id = ' . $_POST['poll_id'] . ' and user_id = ' . Yii::app()->user->id;
				$votes = BbiiVote::model()->findAll($criteria);
				foreach($votes as $vote) {
					$this->poll->saveCounters(array('votes'=>-1));
					$model = BbiiChoice::model()->findByPk($vote->choice_id);
					$model->saveCounters(array('votes'=>-1));
					$vote->delete();
				}
				foreach($_POST['choice'] as $choice) {
					$model = new BbiiVote;
					$model->poll_id = $_POST['poll_id'];
					$model->choice_id = $choice;
					$model->user_id = Yii::app()->user->id;
					$model->save();
					$model = BbiiChoice::model()->findByPk($choice);
					$model->saveCounters(array('votes'=>1));
					$this->poll->saveCounters(array('votes'=>1));
				}
				$choiceProvider=new CActiveDataProvider('BbiiChoice', array(
					'criteria'=>array(
						'condition'=>'poll_id = ' . $_POST['poll_id'],
						'order'=>'sort',
					),
					'pagination'=>false,
				));
				$json['html'] = $this->renderPartial('poll', array('choiceProvider'=>$choiceProvider), true);
				$json['success'] = 'yes';
			} else {
				$json['success'] = 'no';
			}
		} else {
			$json['success'] = 'no';
		}
		echo json_encode($json);
		Yii::app()->end();
	}
	
	/**
	 * Handle Ajax call for display of vote form
	 */
	public function actionDisplayVote() {
		$json = array();
		if(isset($_POST['poll_id'])) {
			$this->poll = BbiiPoll::model()->findByPk($_POST['poll_id']);
			$choiceProvider=new CActiveDataProvider('BbiiChoice', array(
				'criteria'=>array(
					'condition'=>'poll_id = ' . $_POST['poll_id'],
					'order'=>'sort',
				),
				'pagination'=>false,
			));
			$json['html'] = $this->renderPartial('vote', array('choiceProvider'=>$choiceProvider), true);
			$json['success'] = 'yes';
		} else {
			$json['success'] = 'no';
		}
		echo json_encode($json);
		Yii::app()->end();
	}
	
	/**
	 * Handle Ajax call for display of poll edit form
	 */
	public function actionEditPoll() {
		$json = array();
		if(isset($_POST['poll_id'])) {
			$poll = BbiiPoll::model()->findByPk($_POST['poll_id']);
			$choices = array();
			$models = BbiiChoice::model()->findAll('poll_id = '.$poll->id);
			foreach($models as $model) {
				$choices[$model->id] = $model->choice;
			}
			$json['html'] = $this->renderPartial('editPoll', array('poll'=>$poll, 'choices'=>$choices), true);
			$json['success'] = 'yes';
		} else {
			$json['success'] = 'no';
		}
		echo json_encode($json);
		Yii::app()->end();
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	/**
	 * Determine whether a forum is completely read by a user
	 * @param integer forum id
	 * @return boolean
	 */
	public function forumIsRead($forum_id) {
		if(Yii::app()->user->isGuest) {
			return false;
		} else {
			$criteria = new CDbCriteria;
			$criteria->condition = "forum_id = $forum_id";
			$criteria->order = 'last_post_id DESC';
			$criteria->limit = 100;
			$models = BbiiTopic::model()->findAll($criteria);
			$result = true;
			foreach($models as $topic) {
				$topicLog = BbiiLogTopic::model()->findByPk(array('member_id'=>Yii::app()->user->id, 'topic_id'=>$topic->id));
				if($topicLog === null) {
					$result = false;
					break;
				} else {
					if($topic->last_post_id > $topicLog->last_post_id) {
						$result = false;
						break;
					}
				}
			}
			return $result;
		}
	}
	
	/**
	 * Determine whether a topic is completely read by a user
	 * @param integer forum id
	 * @return boolean
	 */
	public function topicIsRead($topic_id) {
		if(Yii::app()->user->isGuest) {
			return false;
		} else {
			$topicLog = BbiiLogTopic::model()->findByPk(array('member_id'=>Yii::app()->user->id, 'topic_id'=>$topic_id));
			if($topicLog === null) {
				return false;
			} else {
				$lastPost = BbiiTopic::model()->cache(300)->findByPk($topic_id)->last_post_id;
				if($lastPost > $topicLog->last_post_id) {
					return false;
				} else {
					return true;
				}
			}
		}
	}
	
	/**
	 * Determine the icon for a topic
	 */
	public function topicIcon($topic) {
		$img = 'topic';
		if($this->topicIsRead($topic->id)) {
			$img .= '2';
		} else {
			$img .= '1';
		}
		if($topic->global) {
			$img .= 'g';
		}
		if($topic->sticky) {
			$img .= 's';
		}
		$criteria = new CDbCriteria;
		$criteria->condition = 'post_id = ' . $topic->first_post_id;
		if(BbiiPoll::model()->exists($criteria)) {
			$img .= 'p';
		}
		if($topic->locked) {
			$img .= 'l';
		}
		return $img;
	}
	
	public function showUpvote($post_id) {
		$url = $this->createAbsoluteUrl('forum/upvote');
		$post = BbiiPost::model()->findByPk($post_id);
		if($post === null || $post->user_id == Yii::app()->user->id) {
			return '';
		}
		$criteria = new CDbCriteria;
		$criteria->condition = "member_id = :userid and post_id = $post_id";
		$criteria->params = array(':userid' => Yii::app()->user->id);
		if(BbiiUpvoted::model()->exists($criteria)) {
			$html = CHtml::image($this->module->getRegisteredImage('down.gif'), 'upvote', array('title'=>Yii::t('BbiiModule.bbii', 'Remove your vote'), 'id'=>'upvote_'.$post_id, 'style'=>'cursor:pointer;', 'onclick'=>'upvotePost(' . $post_id . ',"' . $url . '")'));
		} else {
			$html = CHtml::image($this->module->getRegisteredImage('up.gif'), 'upvote', array('title'=>Yii::t('BbiiModule.bbii', 'Vote this post up'), 'id'=>'upvote_'.$post_id, 'style'=>'cursor:pointer;', 'onclick'=>'upvotePost(' . $post_id . ',"' . $url . '")'));
		}
		return $html;
	}
	
	private function assignMembergroup($id) {
		$member = BbiiMember::model()->findByPk($id);
		$group = BbiiMembergroup::model()->findByPk($member->group_id);
		if($group !== null && $group->min_posts < 0) {
			return;
		}
		$criteria = new CDbCriteria;
		$criteria->condition = "min_posts > 0 and min_posts <= " . $member->posts;
		$criteria->order = 'min_posts DESC';
		$newGroup = BbiiMembergroup::model()->find($criteria);
		if($newGroup !== null and $group->id != $newGroup->id) {
			$member->group_id = $newGroup->id;
			$member->save();
		}
	}
}