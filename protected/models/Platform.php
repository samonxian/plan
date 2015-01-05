<?php

/**
 * This is the model class for table "{{platform}}".
 *
 * The followings are the available columns in table '{{platform}}':
 * @property integer $id
 * @property string $p_name
 * @property string $p_short
 * @property string $p_address
 * @property string $p_r_address
 * @property integer $examine
 * @property string $p_logo_thumb
 * @property integer $m_id
 * @property string $created
 */
class Platform extends NFileActiveRecord{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Platform the static model class
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
		return '{{platform}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('p_name,p_address,m_id,brief,p_logo_thumb', 'required'),
			array('examine, m_id', 'numerical', 'integerOnly'=>true),
			array('p_name', 'length', 'max'=>60),
			array('p_short', 'length', 'max'=>40),
			array('p_address, p_r_address', 'length', 'max'=>110),
			array('p_logo_thumb', 'length', 'max'=>70),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, p_name, p_short, p_address, p_r_address,brief, examine, p_logo_thumb, m_id, created', 'safe', 'on'=>'search'),
		);
	}
        public function fieldType() {
            return array(
                'placement' => 'chosenMultiple',
                'p_name' => 'varchar',
                'p_short' => 'varchar',
                'p_address' => 'url',
                'city' => 'city',
                'tel' => 'tel',
                'fax' => 'tel',
                'p_r_address' => 'url',
                'p_logo_thumb' => 'image',
                'brief' => 'longtext',
                'created' => 'date',
                'm_id' => 'varchar',
            );
        }
        public function chosen(){
            return array(
                'city'=>array(
                    '广东省',
                    '茂名市',
                ),
                'placement'=>array(
                    '推荐运营商',
                    '发斯蒂芬运营商',
                ),
                'p_logo_thumb'=>array(
                    'width'=>'120',
                    'height'=>'46',
                    'scale'=>'2',
                ),
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
                    'company' => array(self::HAS_ONE, 'Company', '', 'on'=>'t.`m_id`=company.`id`','select' => 'name,city,tel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array(
                        'company.short' => '所属公司',
			'placement' => '推荐位置',
			'p_name' => '平台名称',
			'p_short' => '平台简称',
			'p_address' => '平台网址',
			'p_r_address' => '平台注册网址',
                        'city' => '省市所在地',
                        'tel' => '客服电话',
                        'fax' => '传真电话',
			'examine' => '审核状态',
			'p_logo_thumb' => '平台Logo',
                        'brief' => '平台简介',
			'created' => '入库时间',
			'm_id' => '所属公司',
		);
	}
        public function attributeAddLabels() {
            return array(
    //            'placement' => '',
                'p_name' => '平台名称',
    //            'p_short' => '平台简称',
                'p_address' => '平台网址',
    //            'city' => '平台网址',
    //            'tel' => '客服电话',
    //            'fax' => '传真电话',
                'p_logo_thumb' => '平台Logo',
                'brief' => '平台简介',
             );
        }
        public function attributeSearchLabels() {
            return array(
                'p_name' => '平台名称',
                'created' => '入库时间',
            );
        }
        public function attributeAdminLabels() {
            return array(
                'checkbox' => '选择',
                'p_logo_thumb' => '平台Logo',
                'p_name' => '平台名称',
                'p_address' => '平台网址',
                'company.name' => '所属公司',
//                'p_short' => '平台简称',
                'company.city' => '所在城市',
                'created' => '入库时间',
             );
        }
        
        public function attributeStageLabels(){
		return array(
			'id',
			'placement',
			'p_name',
			'p_short',
			'p_address',
			'p_r_address',
                        'city',
                        'tel',
                        'fax',
			'examine',
			'p_logo_thumb',
                        'brief',
			'created',
			'm_id',
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
		$criteria->compare('p_name',$this->p_name,true);
		$criteria->compare('p_short',$this->p_short,true);
		$criteria->compare('p_address',$this->p_address,true);
		$criteria->compare('p_r_address',$this->p_r_address,true);
		$criteria->compare('examine',$this->examine);
		$criteria->compare('p_logo_thumb',$this->p_logo_thumb,true);
		$criteria->compare('m_id',$this->m_id);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}