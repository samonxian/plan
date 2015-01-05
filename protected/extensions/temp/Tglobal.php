<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * @author Administrator
 */
class Tglobal {
	
	public static function isRepeat($model,$data){
		$criteria = new CDbCriteria;
		$condition = "";
		foreach($data as $field=>$value){
			$condition .= " and `".$field."`='".$value."'";
		}
		$condition = substr($condition,4);
		$criteria->condition = $condition;
		$result = new CActiveDataProvider($model, array(
			'criteria'=>$criteria,
		));
		if(!count($result->data)) return false;
		else return true;
	}
	
	public static function getDefaultValue($model,$post,$defaultValueField){
		// 存储cookie会话
		$gameMessagearray = array();
		foreach($defaultValueField as $f){
			$gameMessagearray[$f] = $post[get_class($model)][$f];
		}
		$gameMessage = CJSON::encode($gameMessagearray);  
		GlobalFunction::setCookie(get_class($model), $gameMessage);
	}
	
	public static function setDefaultValue($model){
		$gameMessage = GlobalFunction::getCookie(get_class($model));
		if(!empty($gameMessage)){
			$gameMessage = CJSON::decode($gameMessage);
			foreach ($gameMessage as $n=>$value){
					$model->$n = $value;
			}
		}
	}
	
	public static function find($model,$data=array()){
		if(count($data)){
			$condition1 = "";
			$condition2 = array();
			foreach($data as $field=>$value){
				$condition1 .= " and ".$field."=:".$field;
				$condition2[":".$field] = $value;
			}
			$condition1 = substr($condition1,4);
			$result = $model->findAll($condition1,$condition2);
		}else{
			$result = $model->findAll();
		}
		if(count($result)) return $result;
			else return false;
	}
	public static function remaintime($buydate,$userfultime){
		$currentdate = date("Y-m-d");
		$date=ceil((strtotime($currentdate)-strtotime($buydate))/86400);
		$remaintime = (int)$userfultime - $date;
		$returndate = "";
		if($remaintime >= 0) 
			$returndate = $remaintime."天";
		else 
			$returndate = "已过期";
		return $returndate;
	}
	
	public static function isShort($m_id,$money=0){
		$balancemoney = Tglobal::find(new Balance,array('m_id'=>$m_id));
		if($balancemoney){
			if(($balanceMoney - $money) < 0) 
				return true;
			else 
				return false;
		}else{
			return true;
		}
	}
	public static function balance(){
		$balances = self::find(new Balance,array('m_id'=>Yii::app()->session["id"]));
		$balancemoney = 0;
		if($balances){
			$balancemoney = $balances[0]->money;
		}
		return $balancemoney;
	}
	
	public static function balanceNumber($type){
		$tmpbalance = self::find(new Buymeal,array('m_id'=>Yii::app()->session["id"],'type'=>$type));
		$balanceN = 0;
		if($tmpbalance){
			foreach($tmpbalance as $each_tmpbalance){
				$meal = self::find(new Preferential,array('id'=>$each_tmpbalance->meal_id));
				if($meal){
					if(self::remaintime($each_tmpbalance->date,$meal[0]->term) != "已过期"){
						$balanceN += $each_tmpbalance->balancenumber;
					}
				}
			}
		}
		return $balanceN;
	}
        /**
         * 是否重置周排行
         */
        public static function  isToReset(){
            $text = Yii::getPathOfAlias("application.data.click").".txt";
            return $flag = file_get_contents($text);
        }
        /**
         * 使24小时的数字变成4位数
         */
        public static function  makeTo4($num){
            if(strlen($num)==1){
                $num = "000".$num;
            }else if(strlen($num)==2){
                $num = "00".$num;
            }
            return $num;
        }
}

?>
