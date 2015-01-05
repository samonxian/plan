<?php

/**
 * This is the model class for table "p_sservice".
 *
 * The followings are the available columns in table 'p_sservice':
 * @property integer $id
 * @property string $name
 * @property string $open
 * @property string $service
 * @property integer $type
 * @property string $company
 * @property integer $players
 * @property integer $gift_id
 * @property integer $a_id
 * @property integer $g_id
 * @property integer $p_id
 * @property integer $m_id
 */
class Sservice extends NActiveRecord
{
	public $searchCondition = array();
	public $setChosen = array();
	public $nominatehandle = "";
	public $money = "";
	public $money2 = 0;
	public $players = 0;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sservice the static model class
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
		return 'p_sservice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
				'open,name,service,m_id,g_id,p_id,company,platform,registerAddress,nominate',
				'required'
			),
			array('open, service,serviceName, registerAddress', 'safe', 'on'=>'search'),
		);
	}
	public function validatorRules(){
		return array(
			'service'=>'n1-5',
			//'serviceName'=>'s1-4',
			'registerAddress'=>'url',
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
			'g_id' => 'chosenSingleAjax',
			'open' => 'datetime',
			'service' => 'varchar',
			'platform' => 'varchar',
			'name' => 'varchar',
			'p_id'=> "chosen",
			'serviceName' => 'varchar',
			'registerAddress' => 'url',
			'nominate' => 'chosen',
			'nomi_font' => 'chosenMultiple',
			'money'=>'varchar',
			'nominatehandle'=>'hide',
			'money2'=>'hide',
		);
	}
    
	public function setChosen($name,$dataArray=array()){
            $this->setChosen[$name] = $dataArray;
	}
	
        public function chosen(){
                $arr = array(
                    'g_id'=>array(
                        
                    ),
                    'p_id'=>array(),
                    'nominate'=>array(
                        "否",
                        "是",
                    ),
                    'nomi_font'=>array(
                       '全天'=>'全天',
			'通宵'=>'通宵',
                        '9'=> '9',
                        '10'=>'10',
                        '11'=>'11',
                        '12'=>'12',
                        '13'=>'13',
                        '14'=>'14',
                        '15'=>'15',
                        '16'=>'16',
                        '17'=>'17',
                        '18'=>'18',
                        '19'=>'19',
                        '20'=>'20',
                        '21'=>'21',
                        'separator'=>'-',
                    ),
                );
                $re = array_merge($arr,$this->setChosen);
                return $re;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'g_id' => '游戏名称',
			'name' => '游戏名称',
			//'gstate'=>"游戏状态",
			'platform'=>'运营平台',
			//'platform_type'=>'游戏端类型',
			'open' => '开服时间',
			'service' =>'服务器',
			'type' =>'游戏类型',
                        'serviceName' => '服务器名',
			'registerAddress' => '注册地址',
			'nominate' => '推荐',
                        'nomi_font' => '推荐时间',
			//'type' => '游戏类型',
			'company' => '运营公司',
			//'players' => '玩家人数',
			'gift_id' => '礼包',
			'a_id' => '活动',
			'p_id'=> "运营平台",
			'money'=>'消费记录',
			'nominatehandle'=>'推荐处理',
			'players'=>'进驻人数',
			'money2'=>'金额',
		);
	}
        
    public function attributeAddLabels(){
		return array( 
			'g_id'=>"游戏名称",
			'p_id'=> "运营平台",
//                        'platform' => '运营平台',
//			'name' => '游戏名称',
			'service' => '服务器（输入2，及代表服务器：双线2服）',
			'serviceName' => '服务器名',
			'open' => '开服时间',
			'registerAddress' => '注册地址',
			'nominate' => '推荐',
			'nomi_font' => '推荐时间',
			'money'=>'消费记录',
//			
			'nominatehandle'=>'推荐处理',
                        'money2'=>'金额', 
		);
	}
        
	public function attributeAdminLabels(){
		return array(
			'id' => 'ID',
			'name' => '游戏名称',
			'platform' => '运营平台',
			'open' => '开服时间',
			'service' => '服务器名',
			'registerAddress' => '注册地址',
			'nomi_font' => '推荐时间',
		);
	}
        public function attributeSearchLabels() {
            return array(
                'name' => '游戏名称',
                'platform' => '运营平台',
                'nominate' => '是否推荐',
                'open' => '开服时间',
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
                if(!isset($_GET['Sservice_sort']))
                        $criteria->order = 't.`open` DESC';
		$criteria->condition = $this->searchCondition;
                // Warning: Please modify the following code to remove attributes that
                // should not be searched.
                $criteria->compare('id',$this->id);
                $criteria->compare('name',$this->name,true);
                $criteria->compare('open',$this->open,true);
                $criteria->compare('service',$this->service,true);
                $criteria->compare('serviceName',$this->serviceName,true);
                $criteria->compare('registerAddress',$this->registerAddress,true);
                $criteria->compare('nomi_font',$this->nomi_font);
                $criteria->compare('type',$this->type);
                $criteria->compare('company',$this->company);
                $criteria->compare('players',$this->players);
                $criteria->compare('gift_id',$this->gift_id);
                $criteria->compare('a_id',$this->a_id);
                $criteria->compare('g_id',$this->g_id);
                $criteria->compare('p_id',$this->p_id);
                $criteria->compare('m_id',$this->m_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'8',
			),
		));
	}
}