<?php

/**
 * This is the model class for table "{{company}}".
 *
 * The followings are the available columns in table '{{company}}':
 * @property integer $id
 * @property string $name
 * @property string $user
 * @property string $initial
 * @property string $name_pin
 * @property integer $examine
 * @property integer $mid
 * @property string $pwd
 * @property string $code
 * @property string $short
 * @property string $url
 * @property string $belong
 * @property string $tel
 * @property string $zip_code
 * @property string $fax
 * @property string $mail
 * @property string $article_num
 * @property string $article_d_thumb
 * @property string $icp
 * @property string $icp_d_thumb
 * @property string $address
 * @property string $f_time
 * @property integer $ismarket
 * @property integer $net_vote
 * @property string $business
 * @property string $about_src
 * @property string $logo_thumb
 * @property string $created
 */
class Company extends NFileActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Company the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{company}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name,address,tel,city', 'required'),
            array('examine, mid, ismarket, net_vote', 'numerical', 'integerOnly' => true),
            array('name, user, article_d_thumb, icp_d_thumb, address, logo_thumb', 'length', 'max' => 80),
            array('initial', 'length', 'max' => 1),
            array('name_pin', 'length', 'max' => 100),
            array('pwd, code, tel', 'length', 'max' => 30),
            array('short, belong, zip_code, fax', 'length', 'max' => 20),
            array('url', 'length', 'max' => 200),
            array('mail, article_num, icp', 'length', 'max' => 25),
            array('business', 'length', 'max' => 254),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, user, initial, name_pin, examine, mid, pwd, code, short, url, belong, tel, zip_code, fax, mail, article_num, article_d_thumb, icp, icp_d_thumb, address, f_time, ismarket, net_vote, business, about_src, logo_thumb, created', 'safe', 'on' => 'search'),
        );
    }
    
    public function fieldType() {
        return array(
            'checkbox' => 'select',
            'name' => 'ajaxTextField',
            'short' => 'varchar',
            'user' => 'varchar',
            'initial' => 'varchar',
            'name_pin' => 'varchar',
            'f_time' => 'date',
            'logo_thumb' => 'image',
            'url' => 'url',
            'address' => 'varchar',
            'belong' => 'chosen',
            'city' => 'city',
            'net_vote' => 'varchar',
            'mail' => 'email',
            'tel' => 'tel',
            'fax' => 'tel',
            'about_src' => 'longtext',
            'business' => 'longtext',
            'zip_code' => 'zip_code',
            'article_num' => 'varchar', 
            'article_d_thumb' => 'image',
            'icp' => 'varchar',
            'icp_d_thumb' => 'image',
            'ismarket' => 'chosen',
            'created' => 'date',
        );
    }
    public function chosen(){
        $url = Yii::app()->createUrl('company/checkname');
        return array(
            'name' => array(
               'url'=>$url,
            ),
            'belong' => array(
                '全部'=>'全部地区',
                '中国'=>'中国地区',
                '欧美'=>'欧美地区',
                '日韩'=>'日韩地区',
                '其他'=>'其他地区',
            ),
            'city' => array(
               '广东省',
               '茂名市',
            ),
            'logo_thumb' => array(
                'width'=>'130',
                'height'=>'46',
                'scale'=>'2',
                'both'=>false,
            ),
            'article_d_thumb' => array(
                'width'=>'40',
                'height'=>'30',
                'scale'=>'1',
                'both'=>false,
            ),
            'icp_d_thumb' => array(
                'width'=>'40',
                'height'=>'30',
                'scale'=>'1',
                'both'=>false,
            ),
            'ismarket' => array(
                '0'=>'否',
                '1'=>'是',
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'platforms'=>array(
                self::HAS_MANY,
                'platform',
                'c_id',
            )
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'name' => '公司名称',
            'short' => '公司简称',
            'user' => '用户名',
            'initial' => '公司名称首字母',
            'name_pin' => '公司名称拼音',
            'f_time' => '成立时间',
            'logo_thumb' => '公司Logo',
            'url' => '公司网址',
            'address' => '公司地址',
            'belong' => '所属地域',
            'city' => '所在城市',
            'mail' => '电子邮箱',
            'tel' => '客服电话',
            'fax' => '传真电话',
            'net_vote' => '网友评分',
            'about_src' => '公司简介',
            'business' => '主营业务',
            'zip_code' => '邮政编码',
            'article_num' => '文网文号', 
            'article_d_thumb' => '文网文号扫描件',
            'icp' => 'ICP许可证号',
            'icp_d_thumb' => 'ICP许可证扫描件',
            'ismarket' => '是否上市',
            'created' => '入库时间',
        );
    }
    public function attributeAddLabels() {
        return array(
            'name' => 'requried',
//            'short' => 'requried',
//            'url' => 'requried',
            'address' => '',
//            'belong' => 'requried',
            'city' => '',
//            'f_time' => '',
//            'mail' => '',
//            'zip_code' => '',
            'tel' => 'requried',
//            'fax' => '',
//            'net_vote' => '',
//            'ismarket' => '',
//            'business' => '',
//            'logo_thumb' => 'requried',
//            'about_src' => '',
//            'article_num' => '', 
//            'article_d_thumb' => '',
//            'icp' => '',
//            'icp_d_thumb' => '',
        );
    }
    public function attributeSearchLabels() {
        return array(
            'name' => '公司名称',
//            'belong' => '所属地域',
            'created' => '入库时间',
        );
    }
    public function attributeAdminLabels() {
        $arr = array(
            'checkbox' => '选择',
            'name' => '公司名称',
            'logo_thumb' => '公司Logo',
//            'short' => '公司简称',
//            'belong' => '所属地域',
            'created' => '入库时间',
        );
        
        $re = array_merge($arr,$this->adminLabel);
//        var_dump($re);
        return $re;
    }
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('user', $this->user, true);
        $criteria->compare('initial', $this->initial, true);
        $criteria->compare('name_pin', $this->name_pin, true);
        $criteria->compare('examine', $this->examine);
        $criteria->compare('mid', $this->mid);
        $criteria->compare('pwd', $this->pwd, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('short', $this->short, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('belong', $this->belong, true);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('zip_code', $this->zip_code, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('mail', $this->mail, true);
        $criteria->compare('article_num', $this->article_num, true);
        $criteria->compare('article_d_thumb', $this->article_d_thumb, true);
        $criteria->compare('icp', $this->icp, true);
        $criteria->compare('icp_d_thumb', $this->icp_d_thumb, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('f_time', $this->f_time, true);
        $criteria->compare('ismarket', $this->ismarket);
        $criteria->compare('net_vote', $this->net_vote);
        $criteria->compare('business', $this->business, true);
        $criteria->compare('about_src', $this->about_src, true);
        $criteria->compare('logo_thumb', $this->logo_thumb, true);
        $criteria->compare('created', $this->created, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}