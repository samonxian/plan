<?php

/**
 * This is the model class for table "{{pgame}}".
 *
 * The followings are the available columns in table '{{pgame}}':
 * @property integer $id
 * @property integer $g_id
 * @property integer $m_id
 * @property string $g_url
 */
class Pgame extends NActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pgame the static model class
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
		return '{{pgame}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('g_id,p_id, m_id', 'required'),
			array('g_id, m_id', 'numerical', 'integerOnly'=>true),
			array('g_url', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, g_id, m_id, g_url', 'safe', 'on'=>'search'),
		);
	}
       
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
                    'game'=>array(self::HAS_ONE,'Game','','on'=>'t.`g_id`=game.`id`'),
                    'platform'=>array(self::HAS_MANY,'platform','','on'=>'t.`p_id`=platform.`id`'),
		);
	}
        
        public function fieldType(){
            return array(
                'g_url' => 'url',
            );
	}
        
        public function chosen(){
		return array(
			
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'game.name' => '游戏名称',
			'm_id' => 'M',
			'g_url' => '游戏网址',
		);
	}
        
        public function attributeStageLabels(){
		return array(
                    
		);
	}
        
        public function attributeAdminLabels()
	{
		return array(
			'checkbox' => '选择',
			'game.name' => '游戏名称',
			'game.typet' => '游戏类型',
//			'game.theme' => '游戏题材',
//			'game.gstate' => '游戏状态',
			'g_url' => '游戏网址',
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
		$criteria->compare('g_id',$this->g_id);
		$criteria->compare('m_id',$this->m_id);
		$criteria->compare('g_url',$this->g_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}