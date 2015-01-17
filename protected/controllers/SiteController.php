<?php

class SiteController extends Controller
{
	public $layout='admin_login';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				//mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionIndex($data=null){
		if($data){
			$this->layout = "";
			$data = array(
				array(
					"name"=>"冼善南",
					"nick"=>"燕子南飞",
				),
				array(
					"name"=>"冼善南dd",
					"nick"=>"燕子南飞dd",
				),

			);	
			for($i=0;$i<10000;$i++){
				$data[] = array(
					"name"=>"冼善南dd",
					"nick"=>"燕子南飞dd",
				);
			}
			echo json_encode($data);
			// echo $this->createSeaJsModel($data);
		}else{			
			$this->layout = "";
			$this->render("index");
		}
	}

	public function actionTest(){
		
	}

	public function createSeaJsModel($data){
		$head = "define(function(require, exports, module) {";
		$body = "exports.data =" . json_encode($data) . ";";
		$foot = "});";
		return $head . $body . $foot;
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm($this->id);
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			
            if($model->validate() && $model->login()){

                $this->redirect(Yii::app()->createUrl('company/uncheck'));
            }
				
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		
	}
}
