<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TButtonColumn
 *
 * @author Administrator
 */
Yii::import('bootstrap.widgets.TbButtonColumn');
class TButtonColumn extends TbButtonColumn{
    //put your code here
    public $template='{view} {update} {delete} {add} ';
    protected function initDefaultButtons() {
        parent::initDefaultButtons();
        $this->buttons['add']=array(
            'label'=>'管理该公司后台',
            'url'=>'Yii::app()->createUrl("company/login",array("id"=>$data->primaryKey))',
        );
            
    }
    
    protected function renderButton($id, $button, $row, $data) {
        parent::renderButton($id, $button, $row, $data);
    }
    
}

?>
