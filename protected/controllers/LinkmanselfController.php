<?php

class LinkmanselfController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','operate','Excel'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','operate'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionOperate(){
		new NOprerator($this);
	}
	public function actionExcel(){
		$this->layout = '';
		$dataRender = new NDataRender($this,'excel');
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Linkmanself();

		if(isset($_POST[get_class($model)]))
		{
			$_POST[get_class($model)]['m_id'] = Yii::app()->session['id'];
			$model->attributes=$_POST[get_class($model)];
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}	
		}
	
		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Linkmanself']))
		{
			$model->attributes=$_POST['Linkmanself'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
        function getPlatform(){
            $data = array(
//                '请选择游戏平台'
            );
            $platform = new CActiveDataProvider('Platform',array(
                'criteria'=>array(
                    'condition'=>'t.`m_id`='.Yii::app()->session['id'],
                ),
            ));
            foreach($platform->getData() as $p){
                $data[$p['id']] = $p['p_name'];
            }
            return $data;
        }
	/**
	 * Lists all models.
	 */
	public function actionIndex(){
            $m_id = Yii::app()->session['id'];
            $condition = "t.`m_id`=$m_id";
            $modelName = ucfirst($this->id);
            NDataRender::$show_operation = true;
            $criteria=new CDbCriteria(array(
                'condition'=>$condition,  
                'order'=>'t.`id` DESC',  
                'with'=>'platform',  
            )); 
            NDataRender::$dataProviderOptions = array(
                'criteria' => $criteria,
            );
            $dataRender = new NDataRender($this,'index',array(
                  'show_checkbox_select'=>true,
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Linkmanself('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Linkmanself']))
			$model->attributes=$_GET['Linkmanself'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Linkman the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Linkmanself::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Linkman $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='linkman-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
