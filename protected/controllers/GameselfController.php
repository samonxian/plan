<?php

class GameselfController extends NController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/self';
        
        public function actions(){
            // return external action classes, e.g.:
            return array(
                'include'=>'application.controllers.gameself.IncludeAction',
            );
       }
        
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
				'actions'=>array('index','view','uncheck','search','Ispassed','Isrejected','operate','delete','admin','include'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
                $model=new Gameself;
                if(Yii::app()->request->isAjaxRequest){
                    $name = Yii::app()->request->getParam('name');
                    $comp = Company::model()->find('name=:name',array(':name'=>$name)); 
                    echo CJSON::encode($comp->platforms);
                }else{
                    // Uncomment the following line if AJAX validation is needed
                    // $this->performAjaxValidation($model);
                    
                    if(isset($_POST['Gameself'])) {
//                            $_POST['Game']['theme'] = implode(",",$_POST['Game']['theme']);
//                            $_POST['Game']['typeo'] = implode(",",$_POST['Game']['typeo']);
                            $_POST['Gameself']["name_pin"] = GlobalFunction::cn2pinyin($_POST['Gameself']["name"]);//拼音
                            $_POST['Gameself']['initial'] = ucfirst(substr($_POST['Gameself']["name_pin"],0,1));
                            $_POST['Gameself']['m_id'] = Yii::app()->session['id'];
                            $model->attributes=$model->setAttributes($_POST['Gameself'],false);
                            $url = Yii::app()->createUrl("gameself/create");
                            if($model->save()){
                                echo "<script>
                                    alert('添加成功，审核中。。。');
                                    location.href='{$url}';
                                </script>";
                                
                                //$this->redirectUser($model->id);
                            }
                                    
                    }
                    
                    $this->render('create',array(
			'model'=>$model,
                    ));
                }
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
                if(!isset($_GET['ajax'])){
                  // $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                  $this->redirect(array("index"));
                }	
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
              $this->redirect(Yii::app()->createUrl('pgame'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()	{
		$model=new Game('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Game']))
			$model->attributes=$_GET['Game'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Game the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)	{
                $model = new Gameself;
		$model= $model->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Game $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='Game-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        private function check($examine,$operate,$show=false){
            NDataRender::$show_operation = $show;
            $condition = "t.`m_id`=".Yii::app()->session['id'];
            $modelName = ucfirst($this->id);
            if(!empty($_POST[$modelName])) {
                 $nsearchcondition = new NSearchConditon($this);
                 $s_condtion = $nsearchcondition->condition;
    //             var_dump($s_condtion);
                 if($s_condtion!='')
                    $condition  = "$s_condtion and $condition";
    //             var_dump($condition);
            }
            $criteria=new CDbCriteria(array(  
                'condition'=>$condition,  
                'order'=>'`created` DESC',  
            )); 
            NDataRender::$dataProviderOptions = array(
                'criteria' => $criteria,
            );
            $dataRender = new NDataRender($this,'uncheck',array(
                'show_checkbox_select'=>true,
                'operate'=>$operate,
            ));
        }
        
        public function actionUncheck(){
            $this->check(0,'',true);
        }
        
        /**
         * 批量操作
         */
        public function actionOperate(){
            new NOprerator($this);
        }
   
   
}
