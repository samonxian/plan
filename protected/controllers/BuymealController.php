<?php

class BuymealController extends NController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin_one';

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
				'actions'=>array('index','view','admin','delete','getPlatform','getmeal','gift'),
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

	public function getOpermoney (){
		$perOmoney = 0;
		$data = Tglobal::find(new Nominatemoney,array('type'=>2));
		if($data) $perOmoney = $data[0]->money;	
		return $perOmoney;
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

	
	public function getCompany(){
		$result = Tglobal::find(new Company);
		$company = array(''=>'请选择公司');
		if(count($result)){
			foreach($result as $obj){
				$company[$obj->id] = $obj->name;
			}
		}
		return $company;
	}
	
	public function actionGetPlatform(){
		 if(Yii::app()->request->isAjaxRequest){
			$m_id = (int)Yii::app()->request->getParam('m_id');
			
			$data = Platform::model()->findAll("m_id=:m_id",array(':m_id'=>$m_id));
			$platforms = array();
			foreach ($data as $each_data){
				$platforms[$each_data->id] = $each_data->p_name;
			}
			$obj = array(
				'platforms'=>$platforms,
			);
		   echo CJSON::encode($obj);  
		 }
	}
	public function actionGetmeal(){
		if(Yii::app()->request->isAjaxRequest){
			$type = (int)Yii::app()->request->getParam('type');
			$data = Tglobal::find(new Preferential,array('type'=>$type));
			$meals = array();
			$mealnumberArray = array();
			if($data){
				foreach ($data as $meals_data){
					$meals[$meals_data->id] = $meals_data->name;
					$mealnumberArray[$meals_data->id] = $meals_data->mealnumber;
				}
			}
			$obj = array(
				'meal'=>$meals,
				'mealnumbers'=>$mealnumberArray,
			);
		   echo CJSON::encode($obj);  
		}
	}
	
	public function actionCreate() {
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $alertmessage = array();
                $model=new Buymeal;
                Tglobal::setDefaultValue($model);
                
                if(isset($_POST[get_class($model)])){
					$data = array(
						'm_id'=>$_POST[get_class($model)]['m_id'],
						'date'=>$_POST[get_class($model)]['date'],
						'meal_id'=>$_POST[get_class($model)]['meal_id'],
						'type'=>$_POST[get_class($model)]['type'],
					);
                    if(!Tglobal::isRepeat($model,$data)){
                          // 设置默认值
							$defaultValueField = array(
								// 'money',
								// 'mealnumber',
								// 'usefultime',
								// 'permoney',
								// 'savemoney',
								// 'balancenumber',
								// 'date',
							);
							Tglobal::getDefaultValue($model,$_POST,$defaultValueField);
							$model->setAttributes($_POST[get_class($model)],false);
							
                        
							$balancemodel = Tglobal::find(new Balance,array('m_id'=>$_POST[get_class($model)]['m_id']));
							if($balancemodel){
								$needmoneys = Tglobal::find(new Preferential,array('id'=>$_POST[get_class($model)]['meal_id']));
								
								$balancemoney = $balancemodel[0]->money - $needmoneys[0]->money;
								if($balancemoney < 0){
									$alertmessage = array("余额不足");
								}else{
									$balancemodel[0]->money = $balancemoney;
									$balancemodel[0]->save();
									if($model->save())
									$this->redirect($this->createUrl(get_class($model).'/admin'));
								}
							}else{
								$alertmessage = array("余额不足");
							}
						  
                    }else {
                       $alertmessage = array("该信息已经存在！");
                    }
                }
			$this->render('create',array(
				'model'=>$model,
				'alertmessage'=>$alertmessage,
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
					 $this->redirect($this->createUrl(get_class($model).'/admin'));
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
			//echo "remarkindex";
            //$this->redirect('admin');
	}

        /**
	 * Manages all models.
	 */
	public function actionAdmin(){
		$model=new Buymeal;
		$model->searchCondition = array('type'=>'0');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[get_class($model)]))
			$model->attributes=$_GET[get_class($model)];
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
    public function actionGift(){
		$model=new Buymeal;
		$model->searchCondition = array('type'=>'1');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[get_class($model)]))
			$model->attributes=$_GET[get_class($model)];
		$this->render('admin',array(
			'model'=>$model,
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
		$model=Buymeal::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='buymeal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
