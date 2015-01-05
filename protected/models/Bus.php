<?php

/**
 * This is the model class for table "{{bus}}".
 *
 * The followings are the available columns in table '{{bus}}':
 * @property integer $id
 * @property integer $road
 * @property string $start
 * @property string $end
 * @property string $interval
 * @property string $h_stop
 * @property string $stop
 * @property string $stop_scws
 * @property string $created
 */
class Bus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bus the static model class
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
		return '{{bus}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('road', 'numerical', 'integerOnly'=>true),
			array('interval', 'length', 'max'=>15),
			array('h_stop', 'length', 'max'=>254),
			array('start, end, stop, created', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, road, start, end, interval, h_stop, stop, stop_scws, created', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'road' => '公交编号',
			'start' => '公交早班时间',
			'end' => '公交末班时间',
			'interval' => '两辆公交时间间隔',
                        'h_stop'=>'热点站',
			'stop' => '公交站',
			
			
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

		$criteria->compare('id',$this->id);
		$criteria->compare('road',$this->road);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('end',$this->end,true);
		$criteria->compare('interval',$this->interval,true);
		$criteria->compare('h_stop',$this->h_stop,true);
		$criteria->compare('stop',$this->stop,true);
		$criteria->compare('stop_scws',$this->stop_scws,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}