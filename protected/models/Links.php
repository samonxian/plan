<?php

/**
 * This is the model class for table "{{links}}".
 *
 * The followings are the available columns in table '{{links}}':
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $type
 */
class Links extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Links the static model class
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
		return '{{links}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, url', 'required'),
			array('id, type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>40),
			array('url', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, url, type', 'safe', 'on'=>'search'),
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
	
	public function fieldType(){
		return array(
			'name' => 'varchar',
			'url' => 'varchar',
		);
	}
	
	public function chosen(){
		
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '链接名称',
			'url' => '链接网址',
			'type' => '链接分类',
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeAddLabels()	{
		return array(
			'name' => '链接名称',
			'url' => '链接网址',
		);
	}
	public function attributeAdminLabels()	{
		return array(
			'id' => 'id',
			'name' => '链接名称',
			'url' => '链接网址',
		);
	}
	public function attributeStageLabels()	{
		return array(
			'id' => 'id',
			'name' => 'name',
			'url' => 'url',
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

		$criteria=new CDbCriteria();
		
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'9',
			),
		));
	}
}