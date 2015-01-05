<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        public $id;
        public function __construct($username, $password,$id) {
            parent::__construct($username, $password);
            $this->id = $id;
        }
        public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
                $self = Company::model()->find("user=:user",array(":user"=>$this->username)); 
                
                if($this->id === "admin"){
                    if(!isset($users[$this->username]))
					$this->errorCode=self::ERROR_USERNAME_INVALID;
                    elseif($users[$this->username]!==$this->password)
                            $this->errorCode=self::ERROR_PASSWORD_INVALID;
                    else
                            $this->errorCode=self::ERROR_NONE;
                    return !$this->errorCode;
                }else if($this->id === "self"){
                    if(!$self){
                        $this->errorCode=self::ERROR_USERNAME_INVALID;
                    }  else if($self->pwd != $this->password){
                        $this->errorCode=self::ERROR_PASSWORD_INVALID;
                    }  else {
                        // 赋值给session
                         Yii::app()->session["id"] = $self->id;      // 公司id
                         Yii::app()->session["name"] = $self->user;  // 用户名
                         Yii::app()->session["company"] = $self->name; // 公司名称
                         Yii::app()->session["mid"] = $self->mid;
                         Yii::app()->session["sign"] = $this->id;      
                         $this->errorCode=self::ERROR_NONE;
                    }
                    return !$this->errorCode;
                }else{
                    return 0;
                }
		
	}
//       $uAndp = array(
//           'name'=>array(
//                    'field'=>'user',
//                    'value'=>$username,
//                ),
//            'pwd'=>array(
//                    'field'=>'pwd',
//                    'value'=>$password,
//                ),
//       );
        public static function islogin($uAndp,$modelName){
            $options = array(
                'condition'=>'`'.$uAndp['name']['field'].'`="'.$uAndp['name']['value'].'"',
                //'order'=>'`created` DESC',
            );
            $tmpdata = new CActiveDataProvider($modelName,array(
                "criteria"=>$options
            ));
            $tmpdt = $tmpdata->getData();
            if(empty($tmpdt)) return false;
            foreach ($tmpdt as $tmpdt_each){
               if($tmpdt_each[$uAndp['pwd']['field']] == $uAndp['pwd']['value']){
                     Yii::app()->session["id"] = $tmpdt_each->id;      // 公司id
					 Yii::app()->session["name"] = $tmpdt_each->user;  // 用户名
					 Yii::app()->session["company"] = $tmpdt_each->name; // 公司名称
                    return true;
               }else{
                   return false;
               }   
            }
        }
}