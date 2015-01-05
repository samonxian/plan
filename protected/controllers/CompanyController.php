<?php

class CompanyController extends NController {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/admin_one';
    
    public function actions(){
            // return external action classes, e.g.:
            return array(
                   'create'=>'application.controllers.company.CreateAction'
            );
    }
        
    
    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','uncheck','search','Ispassed','Isrejected','operate','logout','myadd','login','logout','checkname'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionCheckname(){
         $data = Company::model()->find('name=:name',array(':name'=>$_POST['param']));
        
         if(!$data){
             echo '{
                    "info":"验证通过！",
                    "status":"y"
             }';
         }else{
             echo '{
                    "info":"公司名已存在！请定期清理已拒绝的公司！",
                    "status":"n"
             }';
         }   
   }
    
    
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    public function actionSearch(){
        $s_condition = new NSearchConditon($this);
        echo $s_condition->condition;
    }
    private function check($examine,$operate,$view='uncheck',$show=true){
        NDataRender::$show_operation = $show;
        $condition = "`examine`=$examine";
        $modelName = ucfirst($this->id);
        if(!empty($_POST[$modelName])) {
             $nsearchcondition = new NSearchConditon($this);
             $s_condtion = $nsearchcondition->condition;
//             var_dump($s_condtion);
             if($s_condtion!='')
                 $condition  = "$s_condtion and `examine`=$examine";
             
//             var_dump($condition);
        }
        $criteria=new CDbCriteria(array(  
            'condition'=>$condition,  
            'order'=>'`created` DESC',  
        )); 
        NDataRender::$dataProviderOptions = array(
            'criteria' => $criteria,
        );
        $dataRender = new NDataRender($this,$view,array(
            'show_checkbox_select'=>true,
            'operate'=>$operate,
        ));
    }
    
    public function actionMyadd(){
        
        NDataRender::$show_operation = true;
        $condition = "t.`examine`=1 and t.`createby`=1";
        $modelName = ucfirst($this->id);
        if(!empty($_POST[$modelName])) {
             $nsearchcondition = new NSearchConditon($this);
             $s_condtion = $nsearchcondition->condition;
//             var_dump($s_condtion);
             if($s_condtion!='')
                 $condition  = "$s_condtion and `examine`=1 and t.`createby`=1";
             
//             var_dump($condition);
        }
        $criteria=new CDbCriteria(array(  
            'condition'=>$condition,  
            'order'=>'`created` DESC',  
        )); 
        NDataRender::$dataProviderOptions = array(
            'criteria' => $criteria,
        );
        $dataRender = new TDataRender($this,'myadd',array(
            'show_checkbox_select'=>true,
            'operate'=>'delete',
        ));
    }
    
    public function actionLogin($id,$update=''){
        $self = Company::model()->findByPk($id); 
        if(isset($self->id)){
            Yii::app()->session["id"] = $self->id;
            Yii::app()->session["name"] = $self->user;
			Yii::app()->session["company"] = $self->name;
            Yii::app()->session["mid"] = $self->mid;
            Yii::app()->session["sign"] = $this->id;
            Yii::app()->session["back"] = true;
            if(isset($_GET['Sservice_update'])){
                $url = Yii::app()->createUrl("sserviceself/update?id={$_GET['Sservice_update']}");
                $this->redirect($url);
            }else 
                $this->redirect(Yii::app()->createUrl('companyself'));
        }
    }
    public function actionLogout(){
            $this->redirect(Yii::app()->createUrl('company/myadd'));
    }
    
    public function actionUncheck(){
        $this->check(0,'examine');
    }
    public function actionIspassed(){
        //$this->check(1,'delete');
        NDataRender::$show_operation = true;
        $condition = "t.`examine`=1";
        $modelName = ucfirst($this->id);
        if(!empty($_POST[$modelName])) {
             $nsearchcondition = new NSearchConditon($this);
             $s_condtion = $nsearchcondition->condition;
//             var_dump($s_condtion);
             if($s_condtion!='')
                 $condition  = "$s_condtion and `examine`=1";
             
//             var_dump($condition);
        }
        $criteria=new CDbCriteria(array(  
            'condition'=>$condition,  
            'order'=>'`created` DESC',  
        )); 
        NDataRender::$dataProviderOptions = array(
            'criteria' => $criteria,
        );
        $dataRender = new TDataRender($this,'uncheck',array(
            'show_checkbox_select'=>true,
            'operate'=>'delete',
        ));
    }
    public function actionIsrejected(){
       $this->check(2,'e_delete');
    }
    /**
     * 批量操作
     */
    public function actionOperate(){
        new NOprerator($this);
    }
    
    public function getCompanyPassCount(){
        $path = Yii::getPathOfAlias('application.data') .DIRECTORY_SEPARATOR. 'companypass.txt';
        return file_get_contents($path);
    }
    
    public function setCompanyPassCount(){
        $path = Yii::getPathOfAlias('application.data') .DIRECTORY_SEPARATOR. 'companypass.txt';
        $count = file_get_contents($path) + 1;
        return file_put_contents($path,$count);
    }
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($type=0) {
        
        $model=new Company;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Company'])) {
//            $_POST['Company']['created'] = GlobalFunction::$date;
            $_POST['Company']["name_pin"] = GlobalFunction::cn2pinyin($_POST['Company']["name"]);//拼音
            $_POST['Company']['initial'] = ucfirst(substr($_POST['Company']["name_pin"],0,1));
            if(is_numeric($_POST['Company']['initial'])) $_POST['Company']['initial'] = 0;
            $_POST['Company']["createby"] = $type;
            
            
            if(isset($_POST['Company']['city']))
                $_POST['Company']['city'] .= '-'.$_POST['Company']['city1'];
            else $_POST['Company']['city'] = '国外-国外';
            if($type==1){//我添加的公司
                $_POST['Company']["mid"] = $this->getCompanyPassCount()+1;
                $_POST['Company']["examine"] = 1;
                $_POST['Company']["pwd"] = GlobalFunction::random_string(10);
                $_POST['Company']["user"] = 'com'.$_POST['Company']["mid"];
            }
            $model->setAttributes($_POST['Company'],false);
//            var_dump($model->attributes);
            if($model->save()){
                $this->setCompanyPassCount();
                $this->redirectUser($model->id);
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
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Company'])) {
            $_POST['Company']["name_pin"] = GlobalFunction::cn2pinyin($_POST['Company']["name"]);//拼音
            $_POST['Company']['initial'] = ucfirst(substr($_POST['Company']["name_pin"],0,1));
            if(is_numeric($_POST['Company']['initial'])) $_POST['Company']['initial'] = 0;
            $_POST['Company']["user"] = 5884;
            $_POST['Company']["mid"] = $model->count('NOT `mid` = 0')+1;
            if(isset($_POST['Company']['city']))
                $_POST['Company']['city'] .= '-'.$_POST['Company']['city1'];
            else $_POST['Company']['city'] = '国外-国外';
            $model->setAttributes($_POST['Company']);
            if ($model->save())
                $this->redirectUser($model->id);
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
       $this->redirect(Yii::app()->createUrl('company/uncheck'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        NDataRender::$show_operation = true;
        $dataRender = new NDataRender($this,'admin');
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Company the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Company::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Company $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'company-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


}
