<?php

/**
 * This is the model class for table "bbii_message".
 *
 * The followings are the available columns in table 'bbii_message':
 * @property string $id
 * @property string $sendfrom
 * @property string $sendto
 * @property string $subject
 * @property string $content
 * @property string $create_time
 * @property integer $read_indicator
 * @property integer $type
 * @property integer $inbox
 * @property integer $outbox
 * @property string $ip
 * @property string $post_id
 */
class BbiiMessage extends CActiveRecord
{
	public $search;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BbiiMessage the static model class
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
		return 'bbii_message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sendfrom, sendto, subject, content', 'required'),
			array('sendfrom, sendto, read_indicator, type, inbox, outbox, post_id', 'numerical', 'integerOnly'=>true),
			array('sendto', 'mailboxFull', 'on'=>'insert'),
			array('subject', 'length', 'max'=>255),
			array('content','filter','filter'=>array($obj=new CHtmlPurifier(), 'purify')),
			array('ip', 'length', 'max'=>39),
			array('ip', 'blocked'),
			array('ip', 'default', 'value'=>Yii::app()->request->userHostAddress, 'on'=>'insert'),
			array('create_time', 'default', 'value'=>new CDbExpression('NOW()'), 'on'=>'insert'),
			array('create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sendfrom, sendto, subject, content, read_indicator, type, inbox, outbox, ip, post_id', 'safe', 'on'=>'search'),
		);
	}
	
	public function mailboxFull($attr, $params) {
		$criteria = new CDbCriteria;
		$criteria->condition = 'outbox = 1 and sendfrom = '. Yii::app()->user->id;
		if(BbiiMessage::model()->outbox()->count($criteria) >=50) {
			$this->addError('sendto', Yii::t('BbiiModule.bbii', 'Your outbox is full. Please make room before sending new messages.'));
		}
	}

	public function blocked($attribute, $params) {
		if(BbiiIpaddress::blocked($this->ip)) {
			$this->addError('ip', Yii::t('BbiiModule.bbii','Your IP address has been blocked.'));
		}
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sender' => array(self::BELONGS_TO, 'BbiiMember', 'sendfrom'),
			'receiver' => array(self::BELONGS_TO, 'BbiiMember', 'sendto'),
			'forumPost' => array(self::BELONGS_TO, 'BbiiPost', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sendfrom' => Yii::t('BbiiModule.bbii', 'From'),
			'sendto' => Yii::t('BbiiModule.bbii', 'To'),
			'subject' => Yii::t('BbiiModule.bbii', 'Subject'),
			'content' => Yii::t('BbiiModule.bbii', 'Content'),
			'create_time' => Yii::t('BbiiModule.bbii', 'Posted'),
			'read_indicator' => Yii::t('BbiiModule.bbii', 'Read'),
			'type' => Yii::t('BbiiModule.bbii', 'Type'),
			'inbox' => Yii::t('BbiiModule.bbii', 'Inbox'),
			'outbox' => Yii::t('BbiiModule.bbii', 'Outbox'),
			'ip' => 'Ip',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('sendfrom',$this->sendfrom,true);
		$criteria->compare('sendto',$this->sendto,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('read_indicator',$this->read_indicator);
		$criteria->compare('type',$this->type);
		$criteria->compare('inbox',$this->inbox);
		$criteria->compare('outbox',$this->outbox);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('post_id',$this->post_id,true);
		$criteria->limit = 100;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => false,
			'sort'=>array('defaultOrder'=>'id DESC'),
		));
	}
	
	public function scopes() {
		return array(
			'inbox' => array(
				'condition' => 'inbox = 1',
			),
			'outbox' => array(
				'condition' => 'outbox = 1',
			),
			'unread' => array(
				'condition' => 'read_indicator = 0',
			),
			'report' => array(
				'condition' => 'sendto = 0',
			),
		);
	}
}