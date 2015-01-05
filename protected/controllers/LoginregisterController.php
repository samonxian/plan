<?php

class LoginregisterController extends NController{
        public $layout = '//layouts/login_default';
        public function actions(){
			// return external action classes, e.g.:
			return array(
				'platformLogin'=>'application.controllers.login_register.PlatformLoginAction',
				'platformRegister'=>'application.controllers.login_register.PlatformRegisterAction',
				 // captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'CCaptchaAction',
						'backColor'=>0xFFFFFF, 
						'maxLength'=>'4',       // 最多生成几个字符
						 'minLength'=>'2',       // 最少生成几个字符
					   'height'=>'40'
				), 
			);
		}
        
        public function actionIndex(){
            echo "loginIndex";
        }
		
        public function actionlogincheck(){
            if(isset($_POST)){
				$username = isset($_POST['username'])? $_POST['username']:"";
				$password = isset($_POST['password'])? $_POST['password']:"";
				if(empty($username)||empty($password)) $this->redirect ($this->createUrl("loginregister/platformLogin"));
				$uAndp = array(
					'name'=>array(
						 'field'=>'user',
						 'value'=>$username,
					 ),
					 'pwd'=>array(
						 'field'=>'pwd',
						 'value'=>$password,
					 ),
				);
				if(UserIdentity::islogin($uAndp,"Company")){

					$this->redirect($this->createUrl("companyself/view",array("id"=>Yii::app()->session['id'])));
				}else{
					
					$this->redirect($this->createUrl("loginregister/platformLogin"));
				}          
            }
        }
        
        public function actionRegistercheck(){
			/**
				$message = array(
					  "postCompany"=>array("user","mail","pwd","name","short","url","address","tel","city","about_src"),
					  "postPlatform"=>array("p_name","p_short","p_address","brief"),
					  "postLinkman"=>array("c_name","post","c_qq","c_tel"),
				);
			 **/       
            if(isset($_POST['PlatformRegisterForm'])){
                /**
                $post = $_POST['PlatformRegisterForm'];
                $messagearray = array();
                foreach ($post as $field=>$value){
                    foreach ($message as $type=>$type_each){
                        if(in_array($field,$type_each)){
                           if(!isset($messagearray[$type])) $messagearray[$type] = array();
                           $messagearray[$type][$field] = $value;
                        }
                    }
                }
                **/
                /****/
                $company = new Company();
                $company->save(true,null,'PlatformRegisterForm');
                $m_id = $company->attributes['id'];
     
                $platform = new Platform();
                $_POST["PlatformRegisterForm"]["m_id"] = $m_id;
                $platform->save(true,null,'PlatformRegisterForm');
                $p_id = $platform->attributes['id']; 
				
                $linkman = new Linkman();
                $_POST["PlatformRegisterForm"]["p_id"] = $p_id;
                $linkman->save(true,null,'PlatformRegisterForm');
                $this->redirect ($this->createUrl("self/login"));
            }
        }
        
        public function actionCheckrepeat(){
                if(Yii::app()->request->isAjaxRequest){
                    $table = isset($_GET["table"])? $_GET["table"]:"";
                    if(empty($table)) return;
                    $value = isset($_POST["param"])? $_POST["param"]:"" ;
                    $field = isset($_POST["name"])? $_POST["name"]:"" ;
                    preg_match("/\[(.*)\]/",$field,$arr);
                    $field = $arr[1];
                    $rel = $this->getDataProvider(array(
                        'table'=>$table,
                        'condition'=>array(
                            'condition'=>'`'.$field.'`="'.$value.'"',
                        ),
                    ));
                    if($rel) $var = array("info"=>"已经存在！","status"=>"n");
                    else $var = array("info"=>"验证通过！","status"=>"y");
                    echo CJSON::encode($var);  
                }
        }
        public function getDataProvider($con){
            $provider = new CActiveDataProvider($con['table'],array(
                "criteria"=>$con['condition'],
            ));
            return $provider->getData();
        }
}