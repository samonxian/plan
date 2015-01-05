<?php

/**
 *
 */
class Remark extends NFileActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Preferential the static model class
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
		return '{{remark}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'numerical', 'integerOnly'=>true),
			array('', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('', 'safe', 'on'=>'search'),
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
			'content'=>'editor',
        );
    }
    public function chosen(){
        return array(
           
        );
    }


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'type'=>'备注类型',
			'content'=>'内容',
		);
	}
	
	public function attributeAddLabels() {
        return array(
		  'content'=>'内容',
        );
    }
    public function attributeSearchLabels() {
        return array(
            
        );
    }
    public function attributeAdminLabels() {
        $arr = array(
			
		);
        return $arr;
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
		$criteria->compare('type',$this->type);
		$criteria->compare('content',$this->content);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}