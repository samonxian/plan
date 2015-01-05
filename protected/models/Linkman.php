<?php

/**
 * This is the model class for table "{{linkman}}".
 *
 * The followings are the available columns in table '{{linkman}}':
 * @property integer $id
 * @property string $c_name
 * @property string $c_name_pin
 * @property string $initial
 * @property string $post
 * @property string $c_qq
 * @property string $c_tel
 * @property integer $c_show
 * @property integer $m_id
 * @property integer $p_id
 */
class Linkman extends NFileActiveRecord
{

	public $chosen = array();

    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Linkman the static model class
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
		return '{{linkman}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('m_id, p_id', 'required'),
			array('c_show, m_id, p_id', 'numerical', 'integerOnly'=>true),
			array('c_name, c_name_pin, post', 'length', 'max'=>30),
			array('initial', 'length', 'max'=>5),
			array('c_qq, c_tel', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, c_name, c_name_pin, initial, post, c_qq, c_tel, c_show, m_id, p_id', 'safe', 'on'=>'search'),
		);
	}

	 public function fieldType() {
            return array(
                'c_name' => 'varchar',
                'post' => 'varchar',
                'c_qq' => 'qq',
                'c_tel' => 'tel',
                'c_show' => 'chosen',
                'p_id' => 'chosen',
                'm_id' => 'chosen',
            );
        }
        public function chosen(){
            $re = array(
                'c_show'=>array(
                    '0'=>'否',
                    '1'=>'是',
                ),
                'p_id'=>array(
                ),
				'm_id'=>array(
                ),
            );
            $re = array_merge($re,$this->chosen);
            return $re;
        }
		public function setChosen($attribute,$data){
			$this->chosen[$attribute] = $data;
		}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'platform'=>array(self::HAS_ONE,'Platform','','on'=>'t.`p_id`=platform.`id`','select'=>'p_name,p_address,city'),
			'company'=>array(self::HAS_ONE,'Company','','on'=>'t.`m_id`=company.`id`','select'=>'name,url,city'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                    'checkbox' => '选择',
                    'c_name' => '联系人',
                    'post' => '担任职务',
                    'c_qq' => 'QQ',
                    'c_tel' => '联系电话',
                    'c_show' => '是否前台展示',
                    'p_id' => '选择所属平台',
                    'm_id' => '所属公司',
		);
	}
        public function attributeAddLabels() {
            return array(
				'm_id' => '选择公司',
				'p_id' => '选择所属平台',
               'c_name' => '联系人姓名',
                'post' => '职务',
                'c_qq' => 'QQ',
                'c_tel' => '联系电话',
            );
        }
		
        public function attributeSearchLabels() {
            return array(
               'c_name' => '联系人姓名',
                'post' => '职务',
            );
        }
		
        public function attributeAdminLabels() {
            return array(
                'checkbox' => '选择',
                'company.name' => '所属公司',
                'platform.p_name' => '所属平台',
                'c_name' => '联系人',
                'post' => '担任职务',
                'c_qq' => '联系QQ',
                'c_tel' => '联系电话',
            );
        }
		
        public function attributeDownLoadLabels() {
            return array(
                'checkbox' => '选择',
                'company.name' => '所属公司',
                'platform.p_name' => '所属平台',
                'platform.city' => '所在城市',
                'company.url' => '公司网址',
                'platform.p_address' => '平台网址',
                'c_name' => '联系人',
                'post' => '担任职务',
                'c_qq' => '联系QQ',
                'c_tel' => '联系电话',
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
		$criteria->compare('c_name',$this->c_name,true);
		$criteria->compare('c_name_pin',$this->c_name_pin,true);
		$criteria->compare('initial',$this->initial,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('c_qq',$this->c_qq,true);
		$criteria->compare('c_tel',$this->c_tel,true);
		$criteria->compare('c_show',$this->c_show);
		$criteria->compare('m_id',$this->m_id);
		$criteria->compare('p_id',$this->p_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}