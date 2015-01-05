<?php

/**
 * This is the model class for table "{{buymeal}}".
 *
 * The followings are the available columns in table '{{buymeal}}':
 * @property integer $type
 * @property integer $usefultime
 * @property integer $mealnumber
 * @property double $money
 * @property string $date
 * @property string $platform
 * @property integer $p_id
 * @property integer $m_id
 * @property integer $id
 */
class Buymeal extends CActiveRecord
{
	public $searchCondition = array();
	public $setChosen = array();
	
	public $name = "";
	public $mealnumber = 0;
	public $term = 0;
	
	public $remaintime = "";
	public $balancenumber = 0;
	public $money = 0;
	
	
	public $permoney = 0;
	public $savemoney = 0;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Buymeal the static model class
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
		return '{{buymeal}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, m_id', 'numerical', 'integerOnly'=>true),
			array('meal_id','required','message'=>'必须选择套餐'),
			//array('money', 'numerical'),
			//array('platform', 'length', 'max'=>30),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('type, date, m_id, id', 'safe', 'on'=>'search'),
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
			'type' => 'chosen',
			// 'usefultime' => 'varchar',
			// 'mealnumber' => 'varchar',
			// 'money' => 'varchar',
			'date' => 'datetime',
			//'platform' => 'hide',
			'company' => 'hide',
			//'p_id' => 'chosen',
			'm_id' => 'chosenSingle',
			'meal_id' => 'chosen',
			// 'permoney'=>'varchar',
			// 'savemoney'=>'varchar',
			'balancenumber'=>'hide',
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
		   'm_id'=>array(
		   ),
		   'meal_id'=>array(
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
			'type' => '套餐类别',
			'term' => '套餐有效期/天',
			'mealnumber' => '套餐条数',
			'money' => '套餐金额',
			'date' => '购买日期',
			
			'company' => '运营公司',
			'm_id' => '公司',
			
			'remaintime' => '剩余时间',
			'permoney'=>'单条费用',
			'savemoney'=>'节省费用',
			'balancenumber'=>'剩余条数',
			'meal_id' => '套餐',
			'name' => '套餐名称',
			'id' => 'ID',
		);
	}
	public function attributeAddLabels() {
        return array(
			'm_id' => '公司',
			'type' => '套餐类别',
			'meal_id' => '套餐',
			'date' => '购买日期',
			// 'mealnumber' => '套餐条数',
			// 'money' => '套餐金额',
			// 'term' => '套餐有效期/天',
			// 'permoney'=>'单条费用',
			// 'savemoney'=>'节省费用',
			'company' => '运营公司',
			'balancenumber'=>'剩余条数',
        );
    }
    public function attributeSearchLabels() {
        return array(
            
        );
    }
    public function attributeAdminLabels() {
        $arr = array(
			'id' => 'ID',
			'company' => '运营公司',
			'date' => '购买日期',
			'name' => '套餐名称',
			'mealnumber' => '套餐条数',
			'money' => '套餐金额',
			'term' => '套餐有效期/天',
			'balancenumber'=>'剩余条数',
			'remaintime' => '剩余时间',
			'type' => '套餐类别',
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
			$criteria->compare('type',$this->type);
			$criteria->compare('usefultime',$this->usefultime);
			$criteria->compare('mealnumber',$this->mealnumber);
			$criteria->compare('money',$this->money);
			$criteria->compare('date',$this->date,true);
			$criteria->compare('m_id',$this->m_id);
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