<?php

/**
 * This is the model class for table "{{nominatemoney}}".
 *
 * The followings are the available columns in table '{{nominatemoney}}':
 * @property integer $id
 * @property integer $type
 * @property double $money
 */
class Nominatemoney extends CActiveRecord
{

	public $setChosen = array();
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nominatemoney the static model class
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
		return '{{nominatemoney}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'required'),
			array('type', 'numerical', 'integerOnly'=>false),
			array('money', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, money', 'safe', 'on'=>'search'),
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
			'type' => 'chosen',
			'money' => 'varchar',
		);
	}
    
	public function setChosen($name,$dataArray=array()){
			$this->setChosen[$name] = $dataArray;
	}
	
    public function chosen(){
                $arr = array(
					'type'=>array(
						'全天',
						'通宵',
						'单次',
					),
                );
                $re = array_merge($arr,$this->setChosen);
                return $re;
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => '推荐类型',
			'money' => '金额',
		);
	}
	 public function attributeAddLabels(){
		return array( 
			'type' => '推荐类型',
			'money' => '金额',
		);
	}
        
	public function attributeAdminLabels(){
		return array(
			
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
		$criteria->compare('type',$this->type);
		$criteria->compare('money',$this->money);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}