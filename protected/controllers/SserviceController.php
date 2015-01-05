<?php

class SserviceController extends NController
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
				'actions'=>array('index','view','admin','getGameMess','getPlatforms','re','create','update'),
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
	
	public function getGame(){
		$games = Tglobal::find(new Game);
		$gamearray = array(''=>'请选择游戏');
		if($games){
			foreach($games as $each_games){
				$gamearray[$each_games->id] = $each_games->name;
			}
		}
		return $gamearray;
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

	public function actionGetGameMess(){
		if(Yii::app()->request->isAjaxRequest){
			$g_id = (int)Yii::app()->request->getParam('g_id');
			$gameObj = Game::model()->find("id=:g_id",array(':g_id'=>$g_id));
			$obj = array(
				'gametype'=>$gameObj->typet,
			);
		   echo CJSON::encode($obj);  
		}
	}
	public function actionGetPlatforms(){
		if(Yii::app()->request->isAjaxRequest){
			$m_id = (int)Yii::app()->request->getParam('m_id');
			$platformObj = Platform::model()->findAll("m_id=:m_id",array(':m_id'=>$m_id));
			$platforms = array();
			foreach($platformObj as $each_platforms){
				$platforms[$each_platforms->id] = $each_platforms->p_name; 
			}
			$obj = array(
				'platforms'=>$platforms,
			);
		   echo CJSON::encode($obj);  
		}
	}
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Sservice;

		if(isset($_POST[get_class($model)]))
		{
			$post = $_POST[get_class($model)];
			$game = array('p_id');
			$pgame = array('g_id','p_id','m_id','registerAddress');
			$newpost = array();
			foreach($post as $field=>$value){
				if(in_array($field,$pgame)){
					$newpost['pgame'][$field] = $value;
				}
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

		if(isset($_POST['Sservice']))
		{
			$model->attributes=$_POST['Sservice'];
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Sservice');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		NDataRender::$show_operation = true;
                $condition = "";
                $modelName = ucfirst($this->id);
                if(!empty($_POST[$modelName])) {
                     $nsearchcondition = new NSearchConditon($this);
                     $condition = $nsearchcondition->condition;
                }
                $criteria=new CDbCriteria(array(  
                    'condition'=>$condition,  
                    'order'=>'t.`open` DESC',  
                )); 
                NDataRender::$dataProviderOptions = array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize'=>'8',
                    ),
                );
                $dataRender = new NDataRender($this,'admin',array(
                    'show_checkbox_select'=>false,
                    'operate'=>"examine",
                ));
                
		
	}
        
         /**
         * 批量操作
         */
        public function actionOperate(){
            new NOprerator($this);
        }
        
        public function actionRe(){
            $text = Yii::getPathOfAlias("application.data.click").".txt";
            file_put_contents($text,!Tglobal::isToReset());
            $str = "清理完毕！";
            $str = iconv("utf-8",'gb2312', $str);
            echo "<script>alert('$str');history.go(-1);</script>";
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
		$model=Sservice::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='sservice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
