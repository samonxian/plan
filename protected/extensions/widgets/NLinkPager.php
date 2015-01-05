<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NLinkPager
 *
 * @author Administrator
 */
class NLinkPager extends CLinkPager{
    //put your code here
    protected function createPageButtons() {
        $buttons = parent::createPageButtons();
        if(empty($buttons))
            return $buttons;
        $buttons[] = $this->createGoPageButton();
        $this->setGoPageJavacript();
        return $buttons;
    }
    
    protected function setGoPageJavacript(){
        $id = $this->getId();
        $url = $this->createPageUrl("987654321");
        Yii::app()->clientScript->registerScript($url,"
            $('#{$id}_btn').click(function(){
                var val = $('#{$id}_input').val();
                if(val=='') return;
                var url = '{$url}';
                val = url.replace('987654322',val);
                location.href=val;
//                window.open(val);
            });
        ",CClientScript::POS_END);
    }
    
    protected function createGoPageButton(){
        $id = $this->getId();
        $go = '<li class=""><input id="'.$id.'_input" class="last_input" type="text" name="" /></li>';
        $go .= '<li class=""><a id="'.$id.'_btn" href="javascript:void(0)">跳转</a></li>';
        return $go;
    }
}

?>
