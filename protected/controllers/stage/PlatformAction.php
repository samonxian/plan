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
class PlatformAction extends StageAction{
    //put your code here
    
    public function run() {
        $this->setCustomTags(array(
           "rlist","newlist",
        ),'[]');
         $this->setCustomTags(array(
           "countRlist",
        ),'{$}');
        $this->controller->renderWithTags('platform');
    }
    /**
     * 处理导航高亮
     */
    public function tagLnav(){
        $t=array(
            '$nav_num'=>'6',
        );
        return NDataAction::insertCustomDatasByTags($t);
    }
    
    public function tagCountRlist(){
        $count = Platform::model()->count('`examine`=1');
        return $count;
    }
    
    public function tagRlist(){
        $options = array(
            'model'=>'Platform',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                     'condition'=>'t.`examine`=1 and t.`placement`=1',
                     'order'=>'t.`created` DESC',
                ),
                'pagination'=>array(
                    'pageSize'=>5
                ),
            ),
        );
        return NDataAction::insertMemcacheDataByTags($options,'','5884提醒您没有相关运营商');
    }
    
    public function rlistData($d){
        $logoPath = $d->getFilePath(null,'images')."/".$d['p_logo_thumb'];
        $d['p_short'] = GlobalFunction::substrcn($d['p_short'], 5,"");
        $d['p_logo_thumb'] = $logoPath;
    }
    
    public function tagNewlist(){
        $options = array(
            'model'=>'Platform',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                     'condition'=>'`examine`=1',
                     'order'=>'`created` DESC',
                ),
                'pagination'=>array(
                    
                ),
            ),
        );
        return NDataAction::insertMemcacheDataByTags($options,'','5884提醒您没有相关运营商');
    }
    
    public function newlistData($d){
        $this->rlistData($d);
    }
    
    
}

?>
