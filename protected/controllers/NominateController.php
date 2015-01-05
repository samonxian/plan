<?php

class NominateController extends NController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/self';
	//public $nModel = '';
	public function __construct($id, $module = null) {
		parent::__construct($id, $module);
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
				'actions'=>array('create'),
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
	public function getBalance(){
		$balance = Tglobal::find(new Balance,array('m_id'=>Yii::app()->session["id"]));
		$money = 0;
		if($balance){
			$money = $balance[0]->money;
		}
		return $money;
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
	public function actionCreate() {
				$gameExist = 0;
                $model = new Nominate;
				if(isset($_GET['id'])){
					$s_id = $_GET['id'];
					$serdata = Tglobal::find(new Sservice,array('id'=>$s_id));
					if($serdata){
						$needfield = array("m_id","company","p_id","platform","g_id","name","service");
						$needsession = array();
						foreach($needfield as $field){
							$needsession[$field] = $serdata[0][$field];
						}
						$needsession['created'] = date("Y-m-d");
						Yii::app()->session['serdata'] = $needsession;
					}
				}
                if(isset($_POST[get_class($model)])){
					if(isset(Yii::app()->session['serdata'])){
						$_POST[get_class($model)] = array_merge(Yii::app()->session['serdata'],$_POST[get_class($model)]);
					}
					$data = array(
						'created'=>$_POST[get_class($model)]['created'],
						'm_id'=>$_POST[get_class($model)]['m_id'],
						'p_id'=>$_POST[get_class($model)]['p_id'],
						'g_id'=>$_POST[get_class($model)]['g_id'],
						'service'=>$_POST[get_class($model)]['service'],
					);
					if(!Tglobal::isRepeat($model,$data)){
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
						
						// 矫正数据
					   if(isset($_POST[get_class($model)]['nomi_font'])){
							if(is_array($_POST[get_class($model)]['nomi_font']))
							$_POST[get_class($model)]['nomi_font'] = implode(',',$_POST[get_class($model)]['nomi_font']);   
					   }else{
						   $_POST[get_class($model)]['nomi_font'] = "";
					   }
						$model->attributes = $_POST[get_class($model)];
						//var_dump($model->attributes);return;
						if($model->save()){
							$gameExist = 2;
						}
					}else {
						$gameExist = 1;
					}
                }
				
		$this->render('create',array(
			'model'=>$model,
			'gameExist'=>$gameExist,
		));
	}


   
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
