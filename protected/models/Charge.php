<?php

/**
 * This is the model class for table "{{charge}}".
 *
 * The followings are the available columns in table '{{charge}}':
 * @property double $money
 * @property string $date
 * @property string $platform
 * @property integer $p_id
 * @property integer $m_id
 * @property integer $id
 */
class Charge extends CActiveRecord
{
	public $searchCondition = array();
	public $setChosen = array();
	public $platform = "";
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Charge the static model class
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
		return '{{charge}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('m_id', 'numerical', 'integerOnly'=>true),
			array('money', 'numerical'),
			// array('platform', 'length', 'max'=>50),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('money, date, p_id, m_id, id', 'safe', 'on'=>'search'),
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
			'm_id' => 'chosenSingle',
			// 'p_id' => 'oChosenMultiple',
			'date' => 'date',
			'money' => 'varchar',
			// 'platform' => 'hide',
			'company' => 'hide',
        );
    }
	public function setChosen($name,$dataArray=array()){
		$this->setChosen[$name] = $dataArray;
	}
	
    public function chosen(){
        $ar = array(
		   'm_id'=>array(
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
			'm_id' => '公司',
			// 'p_id' => '平台',
			'date' => '充值日期',
			'money' => '充值金额',
			'platform' => '平台名称',
			'company' => '运营公司',
		);
	}
	
	public function attributeAddLabels() {
        return array(
			'm_id' => '公司',
			// 'p_id' => '平台',
			'date' => '充值日期',
			'money' => '充值金额',
			//'platform' => '平台名称',
			'company' => '运营公司',
        );
    }
    public function attributeSearchLabels() {
        return array(
            
        );
    }
    public function attributeAdminLabels() {
        $arr = array(
			'id'=>'id',
			'company' => '运营公司',
			//'platform' => '运营平台',
			'date' => '充值日期',
			'money' => '充值金额',
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
			$criteria->compare('money',$this->money);
			$criteria->compare('date',$this->date,true);
			$criteria->compare('p_id',$this->p_id);
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