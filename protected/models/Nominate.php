<?php


class Nominate extends NActiveRecord
{

	public $nominatehandle = "";
	public $money = "";
	public $money2 = 0;
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
		return '{{nominate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array(
				'name,service,m_id,g_id,p_id,company,platform,nomi_font,created',
				'required'
			),
			array('service', 'safe', 'on'=>'search'),
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
			'nomi_font' => 'oChosenMultiple',
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
                    ),
                );
                return $arr;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array(
			'created' => "推荐日期",
            'nomi_font' => '推荐时间',
			'money'=>'消费记录',
			'nominatehandle'=>'推荐处理',
			'players'=>'进驻人数',
			'money2'=>'金额',
		);
	}
        
    public function attributeAddLabels(){
		return array( 
			'nomi_font' => '推荐时间',
			'money'=>'消费记录',
			'nominatehandle'=>'推荐处理',
            'money2'=>'金额', 
		);
	}
        


	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		 if(!isset($_GET['Sservice_sort']))
                        $criteria->order = 't.`created` DESC';
		if(!count($this->searchCondition)){
			// Warning: Please modify the following code to remove attributes that
			// should not be searched.
		
			$criteria->compare('service',$this->nomi_font);
			 $criteria->compare('created', $this->created, true);
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