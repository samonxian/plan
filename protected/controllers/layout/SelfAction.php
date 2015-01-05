<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameAction
 *
 * @author Administrator
 */
class SelfAction extends TagsAction{
    
    public function __construct($controller, $id) {
        parent::__construct($controller, $id);
//        $this->controller->layout = '//layouts/admin_default';
        $this->setCustomTags(array(
            "nav",
        ),'<>',true);
        $this->setCustomTags(array(
            "stylePath",
        ),'{$}');
        $this->setCustomTags(array(
            "breadcrumbs",
        ),'<>');
    }
    
    public function tagStylePath(){
        return $stylePath = Yii::app()->baseUrl . '/modelStyle/admin/01';
    }
    
    public function tagBreadcrumbs(){
        $widget = '';
        if (!empty($this->controller->breadcrumbs)){
            $widget = $this->controller->widget('bootstrap.widgets.TbBreadcrumbs', array(
                'links' => $this->controller->breadcrumbs,
                'separator' => '/',
                 'homeLink' => CHtml::link( '后台主页', Yii::app()->createUrl('gameself')),
            ),true);
        }
        return $widget;
    }
    public function tagNav(){
        return $this->controller->renderPartial('_nav',null,true);
    }
    //put your code here
   
}

?>
