<?php

/**
 * This is the model class for table "{{setmeal}}".
 *
 * The followings are the available columns in table '{{setmeal}}':
 * @property integer $usefultime
 * @property string $content
 * @property integer $type
 * @property integer $number
 * @property integer $id
 */
class Setmeal extends CActiveRecord
{
	public $setChosen = array();
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Setmeal the static model class
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
		return '{{setmeal}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usefultime, type, number', 'numerical', 'integerOnly'=>true),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('usefultime, content, type, number, id', 'safe', 'on'=>'search'),
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
	
	public function fieldType() {
        return array(
			'usefultime' => 'varchar',
			'content' => 'varchar',
			'type' => 'chosen',
			'number' => 'varchar',
        );
    }
	public function setChosen($name,$dataArray=array()){
		$this->setChosen =  array(
								$name=>$dataArray,
							);
		
	}
	
    public function chosen(){
        $ar = array(
		   'type'=>array(
				'开服套餐',
				'礼包套餐',
		    ),
        );
		return array_merge($ar,$this->setChosen);
    }


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usefultime' => '有效时间/天',
			'content' => '套餐内容',
			'type' => '套餐类型',
			'number' => '套餐编号',
			'id' => 'ID',
		);
	}
	
	public function attributeAddLabels() {
        return array(
			'type' => '套餐类型',
			'number' => '套餐编号',
			'content' => '套餐内容',
			'usefultime' => '有效时间',
        );
    }
    public function attributeSearchLabels() {
        return array(
            
        );
    }
    public function attributeAdminLabels() {
        $arr = array(
			'id' => 'ID',
			'type' => '套餐类型',
			'number' => '套餐编号',
			'content' => '套餐内容',
			'usefultime' => '有效时间',
		);
        return $arr;
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

		$criteria->compare('usefultime',$this->usefultime);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('number',$this->number);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}