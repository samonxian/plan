<?php

class PlatformselfController extends NController
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
				'actions'=>array('index','view','uncheck','search','Ispassed','Isrejected','operate'),
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
       
        /**
         * 批量操作
         */
        public function actionOperate(){
            new NOprerator($this);
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Platformself;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Platformself'])){
                        $_POST['Platformself']["p_name_pin"] = GlobalFunction::cn2pinyin($_POST['Platformself']["p_name"]);//拼音
                        $_POST['Platformself']['initial'] = ucfirst(substr($_POST['Platformself']["p_name_pin"],0,1));
                        if(is_numeric($_POST['Platformself']['initial'])) $_POST['Platformself']['initial'] = 0;
//                        $_POST['Platformself']['created'] = GlobalFunction::$date;
//                        $_POST['Platformself']['examine'] = 1;
                        if(!isset($_POST['Platformself']['placement'])) $_POST['Platformself']['placement'] = '';
                            else
                                $_POST['Platformself']['placement'] = implode(',', $_POST['Platformself']['placement']);
                        $_POST['Platformself']['m_id'] = Yii::app()->session['id'];
//                        $_POST['Platformself']['city'] .= '-'.$_POST['Platformself']['city1'];
                        $model->setAttributes($_POST['Platformself'],false);
			if($model->save())
				$this->redirectUser($model->id);
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
              
		if(isset($_POST['Platformself'])){
                    
//                    $model->attributes=$_POST['Platformself'];
                    if(!isset($_POST['Platformself']['placement'])) $_POST['Platformself']['placement'] = '';
                        else
                            $_POST['Platformself']['placement'] = implode(',', $_POST['Platformself']['placement']);
//                    $_POST['Platformself']['city'] .= '-'.$_POST['Platformself']['city1'];
                    $model->setAttributes($_POST['Platformself'],false);
                    if($model->save())
                            $this->redirectUser($model->id);
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

	/**
	 * Lists all models.
	 */
	public function actionIndex(){
            $mid = Yii::app()->session['id'];
            $condition = "t.`m_id`=$mid";
            $criteria=new CDbCriteria(array(  
                'condition'=>$condition,  
                'order'=>'t.`created` DESC',  
                'with'=>array('company'),
//                'select'=>'t.`examine`=replace(t.examine,0,"否"),t.`id`,t.`p_logo_thumb`,t.`p_name`,t.`city`,t.`p_address`,t.`created`',  
            )); 
            NDataRender::$dataProviderOptions = array(
                'criteria' => $criteria,
            );
            NDataRender::$show_operation = true;
            $dataRender = new NDataRender($this,'uncheck',array(
                'show_checkbox_select'=>false,
                'operate'=>'e_delete',
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Platformself('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Platformself']))
			$model->attributes=$_GET['Platformself'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Platform the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Platformself::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Platform $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='platform-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
