<?php

class OperatorController extends NController{
    
        public $layout = '';
        public function actions(){
		// return external action classes, e.g.:
		return array(
			
		);
	}
        
        
        public function actionLogin(){
            
            $this->render('login');
        }
        public function actionRegister(){
            $this->render('register');
        }
       
        public function actionRegister2(){
            $this->render('register2');
        }
        
        public function actionRegister3(){
            $this->render('register3');
        }
        
        
//	public function actionGame(){
//		$this->render('game');
//	}
//	public function actionPlatform(){
//		$this->render('platform');
//	}
//	public function actionPlatform_info(){
//		$this->render('platform_info');
//	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
        */
	
	
}