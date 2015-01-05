<?php
/* @var $this ForumController */
/* @var $data BbiiPost */
/* @var $postId integer */
?>

<div class="post">
	<?php echo CHtml::tag('a', array('name'=>$data->id)); ?>
	<div class="member-cell">
		<div class="membername">
			<?php echo CHtml::link(CHtml::encode($data->poster->member_name), array('member/view', 'id'=>$data->poster->id)); ?>
		</div>
		<div class="avatar">
			<?php echo CHtml::image((isset($data->poster->avatar))?(Yii::app()->request->baseUrl . $this->module->avatarStorage . '/'. $data->poster->avatar):$this->module->getRegisteredImage('empty.jpeg'), 'avatar'); ?>
		</div>
		<div class="group">
			<?php if(isset($data->poster->group)) {
				if(isset($data->poster->group->image)) {
					echo CHtml::image($this->module->getRegisteredImage($data->poster->group->image), 'group') . '<br>';
				}
				echo CHtml::encode($data->poster->group->name);
			} ?>
		</div>
		<div class="memberinfo">
			<?php echo Yii::t('BbiiModule.bbii', 'Posts') . ': ' . CHtml::encode($data->poster->posts); ?><br>
			<?php echo Yii::t('BbiiModule.bbii', 'Joined') . ': ' . DateTimeCalculation::shortDate($data->poster->first_visit); ?>
		</div>
		<div style="text-align:center;margin-top:10px;">
		<?php if(!Yii::app()->user->isGuest): ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('warn.png'), 'warn', array('title'=>Yii::t('BbiiModule.bbii', 'Report post'), 'style'=>'cursor:pointer;', 'onclick'=>'reportPost(' . $data->id . ')')); ?>
			<?php echo CHtml::link( CHtml::image($this->module->getRegisteredImage('pm.png'), 'pm', array('title'=>Yii::t('BbiiModule.bbii', 'Send private message'))), array('message/create', 'id'=>$data->user_id) ); ?>
			<?php echo $this->showUpvote($data->id); ?>
		<?php endif; ?>
		</div>
	</div>
	<div class="post-cell">
		<div class="post-header">
			<?php if(!(Yii::app()->user->isGuest || $data->topic->locked) || $this->isModerator()): ?>
				<div class="form">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'action'=>array('forum/quote', 'id'=>$data->id),
						'enableAjaxValidation'=>false,
					)); ?>
						<?php echo CHtml::submitButton(Yii::t('BbiiModule.bbii','Quote'), array('class'=>'bbii-quote-button')); ?>
					<?php $this->endWidget(); ?>
				</div><!-- form -->	
			<?php endif; ?>
			<?php if(!($data->user_id != Yii::app()->user->id || $data->topic->locked) || $this->isModerator()): ?>
				<div class="form">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'action'=>array('forum/update', 'id'=>$data->id),
						'enableAjaxValidation'=>false,
					)); ?>
						<?php echo CHtml::submitButton(Yii::t('BbiiModule.bbii','Edit'), array('class'=>'bbii-edit-button')); ?>
					<?php $this->endWidget(); ?>
				</div><!-- form -->	
			<?php endif; ?>
			<div class="header2<?php echo (isset($postId) && $postId == $data->id)?' target':''; ?>"><?php echo CHtml::encode($data->subject); ?></div>
			<?php echo '&raquo; ' . CHtml::encode($data->poster->member_name); ?>
			<?php echo ' &raquo; ' . DateTimeCalculation::full($data->create_time); ?>
			<?php echo ' &raquo; <span class="reputation" title="' . Yii::t('BbiiModule.bbii','Reputation') . '">' . $data->upvoted . '</span>'; ?>
		</div>
		<?php if($this->poll !== null && $this->poll->post_id == $data->id): ?>
		<div class="bbii-poll">
			<strong><?php echo Yii::t('BbiiModule.bbii', 'Poll') . ': ' .$this->poll->question; ?></strong>
			<div id="poll">
			<?php if($this->voted): ?>
				<?php $this->widget('zii.widgets.CListView', array(
					'id'=>'bbiiPoll',
					'dataProvider'=>$this->choiceProvider,
					'itemView'=>'_pollResult',
					'summaryText'=>false,
				)); 
				echo '<div style="text-align:center;width:99%">';
				if($this->poll->user_id == Yii::app()->user->id || $this->isModerator()) {
					echo CHtml::button(Yii::t('BbiiModule.bbii', 'Edit poll'), array('onclick'=>'editPoll(' . $this->poll->id . ', "' . $this->createAbsoluteUrl('forum/editPoll') . '");'));
				}
				if(!Yii::app()->user->isGuest && $this->poll->allow_revote && (!isset($this->poll->expire_date) || $this->poll->expire_date > date('Y-m-d'))) {
					echo CHtml::button(Yii::t('BbiiModule.bbii', 'Change vote'), array('onclick'=>'changeVote(' . $this->poll->id . ', "' . $this->createAbsoluteUrl('forum/displayVote') . '");'));
				}
				echo '</div>';
				?>
			<?php else: ?>
				<?php echo CHtml::form('', 'post', array('id'=>'bbii-poll-form'));
				echo CHtml::hiddenField('poll_id', $this->poll->id);
				$this->widget('zii.widgets.CListView', array(
					'id'=>'bbiiPoll',
					'dataProvider'=>$this->choiceProvider,
					'itemView'=>'_pollChoice',
					'summaryText'=>false,
				)); 
				echo '<div style="text-align:right;width:50%">';
				echo CHtml::button(Yii::t('BbiiModule.bbii', 'Vote'), array('onclick'=>'vote("' . $this->createAbsoluteUrl('forum/vote') . '");'));
				echo '</div>';
				echo CHtml::endForm(); ?>
			<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="post-content">
			<?php echo $data->content; ?>
		</div>
		<div class="signature">
			<?php echo $data->poster->signature; ?>
		</div>
		<div class="post-footer">
			<?php if($data->change_reason): ?>
				<?php echo Yii::t('BbiiModule.bbii','Changed'). ': ' . DateTimeCalculation::long($data->change_time) . ' ' . Yii::t('BbiiModule.bbii','Reason') . ': ' . CHtml::encode($data->change_reason); ?>
			<?php endif; ?>
		</div>
		<?php echo $this->renderPartial('_upvotedBy', array('post_id'=>$data->id)); ?>
		<div class="toolbar">
		<?php if($this->isModerator()): ?>
			<?php echo CHtml::link( CHtml::image($this->module->getRegisteredImage('warn.png'), 'warn', array('title'=>Yii::t('BbiiModule.bbii', 'Warn user'))), array('message/create', 'id'=>$data->user_id, 'type'=>1) ); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('delete.png'), 'delete', array('title'=>Yii::t('BbiiModule.bbii', 'Delete post'), 'style'=>'cursor:pointer;', 'onclick'=>'if(confirm("' . Yii::t('BbiiModule.bbii','Do you really want to delete this post?') . '")) { deletePost("' . $this->createAbsoluteUrl('moderator/delete', array('id'=>$data->id)) . '") }')); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('ban.png'), 'ban', array('title'=>Yii::t('BbiiModule.bbii', 'Ban IP address'), 'style'=>'cursor:pointer;', 'onclick'=>'if(confirm("' . Yii::t('BbiiModule.bbii','Do you really want to ban this IP address?') . '")) { banIp(' . $data->id . ', "' . $this->createAbsoluteUrl('moderator/banIp') . '") }')); ?>
		<?php endif; ?>
		</div>
	</div>
</div>