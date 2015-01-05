<?php

/**
 * This is the model class for table "bbii_log_topic".
 *
 * The followings are the available columns in table 'bbii_log_topic':
 * @property integer $member_id
 * @property integer $topic_id
 * @property integer $forum_id
 * @property integer $last_post_id
 */
class BbiiLogTopic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BbiiLogTopic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bbii_log_topic';
	}
	
	public function primaryKey() {
		return array('member_id', 'topic_id');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_id, topic_id, forum_id, last_post_id', 'required'),
			array('member_id, topic_id, forum_id, last_post_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_id, topic_id, forum_id, last_post_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'member' => array(self::BELONGS_TO, 'BbiiMember', 'member_id'),
			'topic' => array(self::BELONGS_TO, 'BbiiTopic', 'topic_id'),
			'forum' => array(self::BELONGS_TO, 'BbiiPost', 'forum_id'),
			'lastPost' => array(self::BELONGS_TO, 'BbiiPost', 'last_post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'member_id' => 'Member',
			'topic_id' => 'Topic',
			'forum_id' => 'Forum',
			'last_post_id' => 'Last Post',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('member_id',$this->member_id,true);
		$criteria->compare('topic_id',$this->topic_id,true);
		$criteria->compare('forum_id',$this->forum_id,true);
		$criteria->compare('last_post_id',$this->last_post_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}