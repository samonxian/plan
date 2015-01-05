<?php

/**
 * This is the model class for table "{{preferential}}".
 *
 * The followings are the available columns in table '{{preferential}}':
 * @property double $permoney
 * @property double $savemoney
 * @property integer $term
 * @property double $money
 * @property integer $mealnumber
 * @property integer $type
 * @property integer $id
 */
class Preferential extends NFileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Preferential the static model class
	 */
	public $searchCondition = array();
	public $tmptype = "";
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{preferential}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mealnumber, type', 'numerical', 'integerOnly'=>true),
			array('permoney, savemoney, money', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('permoney, savemoney, term, money, mealnumber, type, id', 'safe', 'on'=>'search'),
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
            'permoney' => 'varchar',
			'savemoney' => 'varchar',
			'term' => 'varchar',
			'money' => 'varchar',
			'mealnumber' => 'varchar',
			'type' => 'chosen',
			'name' => 'varchar',
        );
    }
    public function chosen(){
        return array(
           'type'=>array(
				'开服套餐',
				'礼包套餐',
		   ),
        );
    }


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'permoney' => '单条费用',
			'savemoney' => '节省费用',
			'term' => '消费期限(天)',
			'money' => '套餐金额',
			'mealnumber' => '套餐条数',
			'type' => '套餐类型',
			'name' => '套餐名称',
			'id' => 'ID',
		);
	}
	
	public function attributeAddLabels() {
        return array(
			'type' => '套餐类型',
			'name' => '套餐名称',
			'term' => '消费期限',
			'mealnumber' => '套餐条数',
			'money' => '套餐金额',
			'permoney' => '单条费用',
			'savemoney' => '节省费用',
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
			'name' => '套餐名称',
			'term' => '消费期限',
			'mealnumber' => '套餐条数',
			'money' => '套餐金额',
			'permoney' => '单条费用',
			'savemoney' => '节省费用',
		);
        return $arr;
    }
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	
	public function search()
	{
		$criteria=new CDbCriteria;
		if(!count($this->searchCondition)){
			// Warning: Please modify the following code to remove attributes that
			// should not be searched.
			$criteria->compare('permoney',$this->permoney);
			$criteria->compare('savemoney',$this->savemoney);
			$criteria->compare('term',$this->term);
			$criteria->compare('money',$this->money);
			$criteria->compare('mealnumber',$this->mealnumber);
			$criteria->compare('type',$this->type);
			$criteria->compare('id',$this->id);
		}else{
			$rCondition = "";
			foreach($this->searchCondition as $field=>$value){
				$rCondition .= " and `".$field."`='".$value."'";
			}
			$rCondition = substr($rCondition,4);
			$criteria->condition = $rCondition;
		}
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}