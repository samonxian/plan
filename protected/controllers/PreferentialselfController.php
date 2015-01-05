<?php

class PreferentialselfController extends NController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/self';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','admin','delete','gift','selfbuymeal'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

      
	public function actionSelfbuymeal(){
		if(Yii::app()->request->isAjaxRequest){
			$data = array();
			$money = (int)Yii::app()->request->getParam('money');
			$data['type'] = (int)Yii::app()->request->getParam('type');
			$data['balancenumber'] = (int)Yii::app()->request->getParam('balancenumber');
			$data['meal_id'] = (int)Yii::app()->request->getParam('meal_id');
			$data['date'] = date("Y-m-d H:m:s");
			$data['company'] = Yii::app()->session['company'];
			$data['m_id'] = Yii::app()->session['id'];
			
			
			$balances = Tglobal::find(new Balance,array('m_id'=>Yii::app()->session['id']));
			if($balances){
				$tmp = $balances[0]->money - $money;
				if($tmp < 0){
					$state = "余额不足，购买失败！";
				}else{
					$balances[0]->money = $tmp;
					if($balances[0]->save()){
						$model = new Buymeal();
						$model->setAttributes($data,false);
						$model->save();
						$state = "购买成功！";
					}else{
						$state = "购买失败！"; 
					}
				}
			}else{
				$state = "余额为0，请充值！";
			}

			$obj = array(
				'state'=>$state,
			);
		   echo CJSON::encode($obj);  
		}
	}
    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id){
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
        
	public function actionCreate()	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $gameExist = false;
                $model=new Preferential;
                
                Tglobal::setDefaultValue($model);
                
                if(isset($_POST[get_class($model)])){
					$data = array(
						'type'=>$_POST[get_class($model)]['type'],
						'mealnumber'=>$_POST[get_class($model)]['mealnumber'],
					);
                    if(!Tglobal::isRepeat($model,$data)){
                          // 设置默认值
							$defaultValueField = array(
								'permoney',
								'savemoney',
								'term',
								'money',
								'mealnumber',
							);
							Tglobal::getDefaultValue($model,$_POST,$defaultValueField);
							$model->setAttributes($_POST[get_class($model)],false);
                         if($model->save())
                                 $this->redirectUser($model->id);
                    }else {
                        $gameExist = true;
                    }
                }
		$this->render('create',array(
			'model'=>$model,
            'gameExist'=>$gameExist,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		 if(isset($_POST[get_class($model)])){
			$model->setAttributes($_POST[get_class($model)],false);
			if($model->save())
					 $this->redirect($this->createUrl('preferential/admin'));
		 }
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id){
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()	{
            $this->redirect('admin');
	}

        /**
	 * Manages all models.
	 */
	public function actionAdmin(){
		$model=new Preferential;
		$model->searchCondition = array('type'=>'0');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[get_class($model)]))
			$model->attributes=$_GET[get_class($model)];
			
		$remark = Remark::model()->findAll('type=:type',array(':type'=>0));
		$this->render('admin',array(
			'model'=>$model,
			'remark'=>$remark,
		));
	}
	
	public function actionGift(){
		$model=new Preferential;
		$model->searchCondition = array('type'=>'1');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Preferential']))
			$model->attributes=$_GET['Preferential'];
			
		$remark = Remark::model()->findAll('type=:type',array(':type'=>1));
		$this->render('admin',array(
			'model'=>$model,
			'remark'=>$remark,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sservice the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Preferential::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sservice $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='preferential-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
