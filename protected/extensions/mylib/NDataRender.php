<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NDataRender
 *
 * @author Administrator
 */
class NDataRender extends CComponent{
    //put your code here
    private $controller;
    private $model;
    private $modelName;
    private $adminColumns;
    private $dataProvider;
    public $options = array(
        'type'=>'striped bordered hover',
        'template'=>"{items}{pager}",
        'pager'=>array(
            'class'=>'ext.widgets.NPager',
            'displayFirstAndLast'=>true,
            'firstPageLabel'=>'第一页',
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            'lastPageLabel'=>'最后一页',
            'htmlOptions'=>array(
                'class'=>'dd',
            ),
        ),
    );
    public static $show_operation = true;
    public static $dataProviderOptions = array();
    
    public function __construct($controller,$view,$options=null) {
       
        if(!$options) $options = array();
        $this->controller = $controller;
        $this->setModel();
        
        $this->setAdminColumns();
        $this->setDataProvider();
        $this->options($options);
        $this->render($view);
    }
    
    public function setModel(){
        $conName = get_class($this->controller);
        $modelName = explode('Controller',$conName);
        $modelName = $modelName[0];
        $this->model  = new $modelName;
    }
    
    public function getModel(){
        return $this->model;
    }
    
    public function  setAdminColumns(){
        $model = $this->model;
        $labels = $model->attributeAdminLabels();
        $columns = array();
        $i = 0;
        foreach($labels as $key=>$l){
            $columns[$i]['name'] = $key;
            $columns[$i]['header'] = $l;
            $i++;
        }
        $this->adminColumns = $columns;
    }
    
    public function  getAdminColumns(){
        return $this->adminColumns;
    }
    
    public function setDataProvider(){
        $modelName = get_class($this->model);
        if(isset($_GET["{$modelName}_sort"])){
            $criteria = NDataRender::$dataProviderOptions['criteria'];
            $criteria->order = '';
        }
       
        
        $this->dataProvider = new CActiveDataProvider($modelName,NDataRender::$dataProviderOptions);
        if(!isset(NDataRender::$dataProviderOptions['pagination']['pageSize'])){
             $this->dataProvider->pagination->pageSize = 5;
        }
    }
    
    public function getDataProvider(){
        return  $this->dataProvider;
    }
    
    public function render($view){
        $this->controller->render($view, array(
            'options' => $this->options,
            'modelName' => get_class($this->model),
        ));
    }
    
    public function options($options){
        $this->options['dataProvider'] = $this->dataProvider;
        $this->options['columns'] = $this->adminColumns;
        if(NDataRender::$show_operation)
            $this->options['columns'][] = $this->operation();
//        var_dump($this->options['columns']);
        $this->options = array_merge($this->options,$options);
    }
    
    public function operation(){
        $urlPrefix='Yii::app()->createUrl("/'.get_class($this->model).'/';
        return array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'header'=>'操作',
            'updateButtonUrl'=>$urlPrefix.'update",array("id"=>$data->primaryKey))',
            'deleteButtonUrl'=>$urlPrefix.'delete",array("id"=>$data->primaryKey))',
            'viewButtonUrl'=>$urlPrefix.'view",array("id"=>$data->primaryKey))',
            
        );
    }
    
}

?>
