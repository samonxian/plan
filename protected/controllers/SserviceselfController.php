<?php

class SserviceselfController extends NController{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/self';
	//public $nModel = '';
	public function __construct($id, $module = null) {
		parent::__construct($id, $module);
		//$this->nModel = new Sserviceself;
	}
	/**
	 * @return array action filters
	 */
	public function filters(){
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
				'actions'=>array('index','today','view','admin','getPlatform','delete','getBuymeal','SetContents',),
				'users'=>array('@'),
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
	
	public function getGame(){
//		$data = Tglobal::find(new Game);
                $data = Game::model()->findAll("examine=:id",array(':id'=>"1"));
		$datas = array(''=>'请选择游戏');
//                return array();
		if($data){
			foreach($data as $g){
				$datas[$g->id] = $g->name;
			}
		}
                $return['data'] = $datas;
                $return['options'] = array(
                    "url"=>Yii::app()->createUrl("sserviceself/setContents"),
                );
		return $return;
	}
	
	public function getPlatform(){
                $data = Platform::model()->findAll("t.`m_id`=:id and t.`examine`=1",array(':id'=>Yii::app()->session['id']));
		$datas = array(''=>'请选择平台');
		if($data){
			foreach($data as $g){
				$datas[$g->id] = $g->p_name;
			}
		}
		return $datas;
	}
	
	public function getIntroMoney(){
		$data = Tglobal::find(new Nominatemoney);
		$datas = array();
		if($data){
			foreach($data as $each_data){
				$datas[$each_data->type] = $each_data->money;
			}
		}else{
			$datas = array(0,0,0);
		}
		return $datas;
	}
	
	public function getBalance(){
		$balance = Tglobal::find(new Balance,array('m_id'=>Yii::app()->session["id"]));
		$money = 0;
		if($balance){
			$money = $balance[0]->money;
		}
		return $money;
	}
	

	public function actionGetBuymeal(){
		if(Yii::app()->request->isAjaxRequest){
			//$p_id = (int)Yii::app()->request->getParam('p_id');
			$data = Tglobal::find(new Buymeal,array('m_id'=>Yii::app()->session['id'],'type'=>0));
			$meals = array();
			$isBuymeal = false;
			if($data){
				foreach ($data as $each_data){
					$meal = Tglobal::find(new Preferential,array('id'=>$each_data->meal_id));
					if(Tglobal::remaintime($each_data->date,$meal[0]->term) == "已过期") continue;
					$meals[$each_data->id] = $each_data->balancenumber;
				}
				if(count($meals)) $isBuymeal = true;
			}   

			$obj = array(
				'isBuymeal'=>$isBuymeal,
				'mealArray'=>$meals,
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
        
	public function actionCreate(){
            $gameExist = 0;
            $model = new Sservice;
            Tglobal::setDefaultValue($model);
            $checkArray = array();
            if(isset($_POST[get_class($model)])){
                // 矫正数据
                $_POST[get_class($model)]['m_id'] = Yii::app()->session["id"];
                $_POST[get_class($model)]['company'] = Yii::app()->session["company"];
                if($_POST[get_class($model)]['nominate'] != 0){
                    if(isset($_POST[get_class($model)]['nomi_font'])){
                        if(is_array($_POST[get_class($model)]['nomi_font'])){
                            foreach($_POST[get_class($model)]['nomi_font'] as $i=>$p){
                                if($p=="全天") $_POST[get_class($model)]['nomi_font'][$i] = Tvar::$day_refer[0]; 
                                if($p=="通宵") $_POST[get_class($model)]['nomi_font'][$i] = Tvar::$day_refer[1]; 
                            }
                            //转成4位数
//                            foreach($_POST[get_class($model)]['nomi_font'] as $key=>$p){
//                                $_POST[get_class($model)]['nomi_font'][$key] = Tglobal::makeTo4($p);
//                            }
                            $_POST[get_class($model)]['nomi_font'] = implode('-',$_POST[get_class($model)]['nomi_font']);   


                        }
                     }else{
                        $_POST[get_class($model)]['nomi_font'] = "";
                     }
                }else{
                    $_POST[get_class($model)]['nomi_font'] = "";
                    $_POST[get_class($model)]['nominatehandle'] = "";
                    $_POST[get_class($model)]['money2'] = "";
                }

                $data = array(
                    'service'=>$_POST[get_class($model)]['service'],
                    'g_id'=>$_POST[get_class($model)]['g_id'],
                    'p_id'=>$_POST[get_class($model)]['p_id'],
                    'm_id'=>$_POST[get_class($model)]['m_id'],
                );
                if(!Tglobal::isRepeat($model,$data)){

                  // 设置默认值
//						$defaultValueField = array(
//							'open',
//							'service',
//							'serviceName',
//							'registerAddress',
//						);
//						Tglobal::getDefaultValue($model,$_POST,$defaultValueField);
//						
                    // 去除消费套餐		
                    if(!empty($_POST[get_class($model)]['nominatehandle'])){
                        $tttmp = explode("/",$_POST[get_class($model)]['nominatehandle']);
                        foreach($tttmp as $each_tttmp){
                            if(!empty($each_tttmp)){
                                $ttmm = explode(":",$each_tttmp);
                                $buymeal = Tglobal::find(new Buymeal,array('id'=>$ttmm[0]));
                                if($buymeal){
                                        $buymeal[0]->balancenumber = $ttmm[1];
                                        $buymeal[0]->save();
                                }
                            }
                        }
                    }
                    // 计算费用
                    if($_POST[get_class($model)]['money2'] != 0){
                        $balancehandle = Tglobal::find(new Balance,array('m_id'=>$_POST[get_class($model)]['m_id']));
                        if($balancehandle){
                            $balancehandle[0]->money = $balancehandle[0]->money - $_POST[get_class($model)]['money2'];
                            $balancehandle[0]->save();
                        }
                    }

                    // 推荐入库
                    $nomidate = array();
                    $nomidate = $_POST[get_class($model)];
                    $nomidate['created'] = date("Y-m-d");
                    $nomimodel = new Nominate;
                    $nomimodel->attributes = $nomidate;
                    //var_dump($nomimodel->attributes);return;
                    // var_dump($nomidate);return;
                    $nomimodel->save();

                    //设置开服量
                    $gameObj = Game::model()->find("id=:id",array(':id'=>$_POST[get_class($model)]['g_id']));
                    $p = array();
                    $p["Game"]['open'] = $gameObj->open + 1;
                    if(Tglobal::isToReset()){
                        $p["Game"]['openprevweek'] = $gameObj->openprevweek + 1;
                    }else{
                        $p["Game"]['openthisweek'] = $gameObj->openthisweek + 1;
                    }
                   $gameObj->attributes=$gameObj->setAttributes($p['Game'],false);
//                    var_dump($gameObj->attributes);
                   $gameObj->saveAttributes($gameObj->attributes);
                    // 开服入库
                   $platformObj = Platform::model()->find("id=:id",array(':id'=>$_POST[get_class($model)]['p_id']));
                   $_POST[get_class($model)]['type'] = $gameObj->typet;
                   $_POST[get_class($model)]['name'] = $gameObj->name;
                   $_POST[get_class($model)]['platform'] = $platformObj->p_name;
                   $model->attributes = $model->setAttributes($_POST[get_class($model)],false);
//                                                var_dump($model->attributes);
//                                                return;

                    if($model->save()){
                        // 收录游戏
                        $data = array(
                            'g_id'=>$_POST[get_class($model)]['g_id'],
                            'p_id'=>$_POST[get_class($model)]['p_id'],
                            'm_id'=>$_POST[get_class($model)]['m_id'],
                        );
                        $pgame = new Pgame();
                        if(!Tglobal::isRepeat($pgame,$data)){
                            $data['g_url'] =$_POST[get_class($model)]['registerAddress'];
                            $pgame->attributes = $data;
                            $pgame->save();
                        }
                    }
                    $gameExist = 2;
                    Yii::app()->user->setFlash('success',Yii::t('Nan','开服成功！'));
                    //游戏信息存储，以便用户选择这个游戏后系统自动填写相关信息
                    $temp = array(
                        "g_id"=>$_POST[get_class($model)]['g_id'],
                        "p_id"=>$_POST[get_class($model)]['p_id'],
                        "service"=>$_POST[get_class($model)]['service'],
                        "serviceName"=>$_POST[get_class($model)]['serviceName'],
                        "open"=>$_POST[get_class($model)]['open'],
                        "registerAddress"=>$_POST[get_class($model)]['registerAddress'],
                        "nominate"=>$_POST[get_class($model)]['nominate'],
                        "nomi_font"=>$_POST[get_class($model)]['nomi_font'],
                    );


                    $t_id = Yii::app()->session["id"];
                    $path = Yii::getPathOfAlias("application.data.service.t_$t_id");
                    $file = "";
                    if(!is_dir($path))
                        mkdir($path, Tdata::$mode);
                    $file = Yii::getPathOfAlias("application.data.service.t_$t_id.{$temp['g_id']}");
                    $string = json_encode($temp);
                    file_put_contents($file.".txt", $string);
                    //设置保存并添加后游戏id值
                    if(isset($_POST['_addanother'])){
                        Yii::app()->session['temp_game_id'] = $_POST[get_class($model)]['g_id'];
                    }
                    $this->redirect("create");
                }else {
                    $gameExist = 1;
                    Yii::app()->user->setFlash('error',Yii::t('Nan','该开服信息已经存在！'));
                    $this->redirect("create");
                }
            }
            $this->render('create',array(
                'model'=>$model,
                'gameExist'=>$gameExist,
            ));
	}
        
        public function actionSetContents(){
            $t_id = Yii::app()->session["id"];
            $file = Yii::getPathOfAlias("application.data.service.t_$t_id.{$_POST['value']}").".txt";
            if(file_exists($file))
                echo $contents = file_get_contents($file);
            else{
                $file = Yii::getPathOfAlias("application.data.service.empty_open").".txt";
                echo $contents = file_get_contents($file);
            }
//            var_dump($_POST);
        }
        
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id){
		$model=$this->loadModel($id);
                $is_today = false;
		$hour = GlobalFunction::getHourByDate($model->open);
                if(date('Y-m-d H:i:s')>$model->open) $is_today = true;
                if($is_today){
                    header("Content-type:text/html;charset=utf-8");
                    echo "<script>alert('开服时间已过，不可修改！');history.go(-1);</script>";
                    return;
                }
		if(isset($_POST[get_class($model)])){
//			$_POST[get_class($model)]['m_id'] = Yii::app()->session["id"];
//			$_POST[get_class($model)]['company'] = Yii::app()->session["company"];
			$_POST[get_class($model)]['m_id'] = Yii::app()->session["id"];
			// 矫正数据
			if($_POST[get_class($model)]['nominate'] != 0){
				if(isset($_POST[get_class($model)]['nomi_font'])){
					 if(is_array($_POST[get_class($model)]['nomi_font']))
					 
                                        foreach($_POST[get_class($model)]['nomi_font'] as $i=>$p){
                                            if($p=="全天") $_POST[get_class($model)]['nomi_font'][$i] = Tvar::$day_refer[0]; 
                                            if($p=="通宵") $_POST[get_class($model)]['nomi_font'][$i] = Tvar::$day_refer[1]; 
                                        }
                                        //转成4位数
//                                        foreach($_POST[get_class($model)]['nomi_font'] as $key=>$p){
//                                            $_POST[get_class($model)]['nomi_font'][$key] = Tglobal::makeTo4($p);
//                                        }
                                         $_POST[get_class($model)]['nomi_font'] = implode('-',$_POST[get_class($model)]['nomi_font']);   
				}else{
					$_POST[get_class($model)]['nomi_font'] = "";
				}
			 }else{
				  $_POST[get_class($model)]['nomi_font'] = "";
			 }
			 // 去除消费套餐		
			if(!empty($_POST[get_class($model)]['nominatehandle'])){
				$tttmp = explode("/",$_POST[get_class($model)]['nominatehandle']);
				foreach($tttmp as $each_tttmp){
					if(!empty($each_tttmp)){
						$ttmm = explode(":",$each_tttmp);
						$buymeal = Tglobal::find(new Buymeal,array('id'=>$ttmm[0]));
						if($buymeal){
							$buymeal[0]->balancenumber = $ttmm[1];
							$buymeal[0]->save();
						}
					}
				}
			}
			// 计算费用
			if($_POST[get_class($model)]['money2'] != 0){
				$balancehandle = Tglobal::find(new Balance,array('m_id'=>$_POST[get_class($model)]['m_id']));
				if($balancehandle){
					$balancehandle[0]->money = $balancehandle[0]->money - $_POST[get_class($model)]['money2'];
					$balancehandle[0]->save();
				}
			}
			
			
			$model->setAttributes($_POST[get_class($model)],false);
                        if($model->save()){
                            //设置保存并添加后游戏id值
                            if(isset($_POST['_addanother'])){
                               Yii::app()->session['temp_game_id'] = $_POST[get_class($model)]['g_id'];
                            }
                            $this->redirectUser($model->id);
                        }
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
		$model=new Sservice('search');
		$model->searchCondition = 't.`m_id`='.Yii::app()->session["id"];
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET[get_class($model)]))
			$model->attributes=$_GET[get_class($model)];
		
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionToday(){
		$model=new Sservice('search');
		$model->searchCondition = 'to_days(t.`open`)=to_days(now())';
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
