<?php

/**
 * This is the model class for table "{{pinfo}}".
 *
 * The followings are the available columns in table '{{pinfo}}':
 * @property integer $id
 * @property string $name
 * @property string $typeo
 * @property string $system
 * @property string $relative
 * @property string $cCompany
 * @property string $rCompany
 * @property string $site
 * @property string $downaddress
 * @property string $platform
 * @property string $typet
 * @property string $theme
 * @property string $ul
 * @property string $fightform
 * @property string $gstate
 * @property string $chargingMode
 * @property string $address
 * @property string $img
 */
class Pinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pinfo the static model class
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
		return '{{pinfo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, relative, cCompany, rCompany,typet, theme,  gstate', 'required'),
			array('name, typeo, system, cCompany, rCompany, platform', 'length', 'max'=>50),
			array('relative, site, downaddress, address, img', 'length', 'max'=>100),
			array('typet, theme, ul, fightform, gstate, chargingMode', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, typeo, system, relative, cCompany, rCompany, site, downaddress, platform, typet, theme, ul, fightform, gstate, chargingMode, address, img', 'safe', 'on'=>'search'),
		);
	}
        
        public function fieldType() {
            return array(
                'id' => 'ID',
			'name' => 'varchar',
			'typeo' => 'chosen',
			'system' => 'chosen',
			'relative' => 'chosenMultiple',
			'cCompany' => 'varchar',
			'rCompany' => 'varchar',
			'site' => 'url',
			'downaddress' => 'varchar',
			'platform' => 'varchar',
			'typet' => 'chosen',
			'theme' => 'chosen',
			'ul' => 'chosen',
			'fightform' => 'chosen',
			'gstate' => 'chosen',
			'chargingMode' => 'chosen',
			'address' => 'varchar',
			'img' => 'image',
                        'created'=>'date',
                        'examine'=>'chosen',
                        'p_id'=>'varchar',
            );
        }
        
        public function chosen(){
            return array(
                'typeo' => array(
                    '1'=>'网页游戏  ',
                    '0'=>'客户端游戏',
                    '2'=>'手机游戏',
                ),
                'system' => array(
                    '0'=>'PC端',
                    '1'=>'安卓   ',
                    '2'=>'苹果 ',
                    '3'=>'WP',
                    '4'=>'塞班',
                    '5'=>'其他 ',
                ),
               
                'typet' => array(
                    '0'=>'角色扮演',
                    '1'=>'战阵策略',
                    '2'=>'模拟经营',
                    '3'=>'益智休闲',
                    '4'=>'运动竞技',
                    '5'=>'其他类型',
                ),
                'relative' => array(
                    '0'=>'iphone ',
                    '1'=>'iPad ',
                    '2'=>'Android ',
                    '3'=>'aPad ',
                    '4'=>'微端aPad',
                    '5'=>'其他',
                ),
                
                'theme' => array(
                    '0'=>'音乐 ',
                    '1'=>'武侠 ',
                    '2'=>'科幻 ',
                    '3'=>'三国 ',
                    '4'=>'西游 ',
                    '5'=>'战争 ',
                    '6'=>'魔幻  ',
                    '7'=>'动漫  ',
                    '8'=>'历史  ',
                    '9'=>'射击  ',
                    '10'=>'体育  ',
                    '11'=>'棋牌  ',
                    '12'=>'竞速  ',
                    '13'=>'商业  ',
                    '14'=>'儿童  ',
                    '15'=>'格斗  ',
                    '16'=>'修真   ',
                    '17'=>'航海',
                    '18'=>'玄幻 ',
                    '19'=>'仙侠',
                    '20'=>'其他',
                ),
                 'ul' => array(
                    '0'=>'2D',
                    '1'=>'2.5D',
                    '2'=>'3D',
                    '3'=>'横版',
                    '4'=>'其他',
                ),
                'fightform' => array(
                    '0'=>'回合',
                    '1'=>'战棋',
                    '2'=>'文字',
                    '3'=>'半即时',
                    '4'=>'卡牌',
                    '5'=>'自动',
                    '6'=>'其他',
                ),
                'gstate' => array(
                    '0'=>'封测',
                    '1'=>'内测',
                    '2'=>'公测',
                    '3'=>'测试',
                    '4'=>'研发中',
                ),
                'chargingMode' => array(
                    '0'=>'道具收费',
                    '1'=>'时长收费',
                    '2'=>'下载收费',
                    '3'=>'完全免费',
                ),
                 'examine' => array(
                    '0'=>'不通过',
                    '1'=>'通过',
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
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			 'name'=>'游戏名称',
                         'created'=>'入库时间',
                        'typeo' => '游戏端类型',
                        'system' => '操作系统',
                        'relative' => '平台互通',
                        'cCompany' => '研发公司',
                        'rCompany' => '运营公司',
                        'site' => '官方网站',
                        'downaddress' => '下载地址',
                        'platform' => '官方论坛',
                        'typet' => '游戏类型',
                        'theme' => '游戏题材',
                        'ul' => '游戏界面',
                        'fightform' => '战斗场景',
                        'gstate' => '游戏状态',
                        'chargingMode' => '充值模式',
                        'address' => '所在地区',
                        'img' => '入库图片',
                         'examine'=>'审核状态',
                         'm_id'=>'选择厂商',
                        'p_id'=>'选择平台',
		);
	}
        public function attributeAddLabels() {
            return array(
//              'created'=>'入库时间',
                'name' => 'name',
               // 'typeo' => 'Typeo',
               // 'system' => 'System',
                'relative' => 'Relative',
                'cCompany' => 'C Company',
                'rCompany' => 'R Company',
               // 'site' => 'Site',
               // 'downaddress' => 'Downaddress',
                //'platform' => 'Platform',
                'typet' => 'Typet',
                'theme' => 'Theme',
                //'ul' => 'Ul',
                //'fightform' => 'Fightform',
                'gstate' => 'Gstate',
                //'chargingMode' => 'Charging Mode',
//                'address' => 'Address',
                'img' => 'Img',
//                 'examine'=>'审核状态',
            );
        }
        public function attributeSearchLabels() {
            return array(
                'name' => 'Name',
                'typeo' => 'Typeo',
                 'theme' => 'Theme',
 
            );
        }
        public function attributeAdminLabels() {
            return array(
                'checkbox'=>'选择',
                'name'=>'游戏名称',
                'created'=>'入库时间',
               'relative' => '平台互通',
               'theme' => '游戏题材',
               'gstate' => '测试状态',
              // 'chargingMode' => '充值模式',
               'examine'=>'审核状态',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('typeo',$this->typeo,true);
		$criteria->compare('system',$this->system,true);
		$criteria->compare('relative',$this->relative,true);
		$criteria->compare('cCompany',$this->cCompany,true);
		$criteria->compare('rCompany',$this->rCompany,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('downaddress',$this->downaddress,true);
		$criteria->compare('platform',$this->platform,true);
		$criteria->compare('typet',$this->typet,true);
		$criteria->compare('theme',$this->theme,true);
		$criteria->compare('ul',$this->ul,true);
		$criteria->compare('fightform',$this->fightform,true);
		$criteria->compare('gstate',$this->gstate,true);
		$criteria->compare('chargingMode',$this->chargingMode,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('img',$this->img,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}