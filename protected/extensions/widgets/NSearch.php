<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NSearch
 *
 * @author Administrator
 */
class NSearch extends CWidget{
    public $dataProvider;
    public $selector = 'yw0';
    
    
    private $form_id;
    //put your code here
    public function init() {
        parent::init();
        $this->createForm();
        $this->registerScript();
    }
    
    protected function registerScript(){
        $baseUrl = Yii::app()->baseUrl;
        $url = Yii::app()->createUrl($this->controller->id . '/' .$this->controller->action->id);
        Yii::app()->clientScript->registerScript('validform',"
            var nformSearch;
            seajs.use('$baseUrl/js/admin/FormSearch.js',function(){
                nformSearch = FormSearch('$this->selector','$url','$this->form_id');
            });
            
        ",CClientScript::POS_END);
    }
    
    protected function createForm(){
        $model = $this->dataProvider->model;
        $attributes = array();
        foreach ($model->attributeSearchLabels() as $attribute => $label) {
            if (isset($model->tableSchema->columns[$attribute]) && $model->tableSchema->columns[$attribute]->isPrimaryKey === true) {
                continue;
            }
            $attributes[] = $attribute;
        }
        $attributes = array_filter(array_unique(array_map('trim', $attributes)));
        $this->form_id = $this->controller->id . rand(0, 100000);
        $form = $this->controller->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => $this->form_id,
            'inlineErrors' => false,
            'type'=>'inline',
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
                'class' => 'j_Validform',
            ),
        ));
//        $this->controller->widget('ext.chosen.Chosen',array(
//           'name' => get_class($model)."[searchType]", // input name
//           'htmlOptions' => array(
//               'class'=>'span2',
//               'style'=>'width:88px;',
//           ), // selection
////           'class'=>'mr5',
//           'data' => array(
//               'dim'=>'模糊搜索',
//               'accurate'=>'精确搜索',
//           ),
//        ));
        echo CHtml::dropDownList(
            get_class($model)."[searchType]", 
            'sdf',
            array(
               'dim'=>'模糊搜索',
               'accurate'=>'精确搜索',
            ),
            array(
               'class'=>'span2 mr5',
               'style'=>'width:98px',
            )
                
        );
        
        foreach ($attributes as $attribute) {
            $this->controller->widget('ext.widgets.BootstrapBuildFormChild', array(
                'textField_span' => 'span3 mr5',
                'form' => $form,
                'model' => $model,
                'attribute' => $attribute,
            ));
        }
        echo CHtml::button('查询',array(
            'class'=>'btn ml5',
            'type'=>'submit',
            'onclick'=>'nformSearch.search(event)',
        ));
        $this->controller->endWidget();
    }
}

?>
