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
class Sserviceself extends Sservice
{

	public $setChosen = array();
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sservice the static model class
	 */
    
    public static function model($className=__CLASS__) {
            return parent::model($className);
    }    
    
   
        
	
	
	

	
	public function search(){
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
                
		 if(!isset($_GET['Sservice_sort']))
                        $criteria->order = 't.`open` DESC';
		
                $criteria->compare('id',$this->id);
                $criteria->compare('name',$this->name,true);
                $criteria->compare('open',$this->open,true);
                $criteria->compare('service',$this->service,true);
                $criteria->compare('serviceName',$this->serviceName,true);
                $criteria->compare('registerAddress',$this->registerAddress,true);
                $criteria->compare('nomi_font',$this->nomi_font);
                $criteria->compare('type',$this->type);
                $criteria->compare('company',$this->company);
                $criteria->compare('platform',$this->platform);
                $criteria->compare('nominate',$this->nominate);
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