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
class KaifuAction extends StageAction{
    //put your code here
    
    public function run() {
        $this->setCustomTags(array(
            "kaifu",
            "count",
        ),'<onlyone>');
       
        $this->setCustomTags(array(
            "count",
        ),'{$}');
		
        $this->controller->render('/stage/kaifu');
    }
    public function tagLnav(){
        $t=array(
            '$nav_num'=>'1',
        );
        return NDataAction::insertCustomDatasByTags($t);
    }
    
    /**
     * 今日开服
     */
    public function tagKaifu($info="开服信息"){
        $search = $this->search('count');
        $date = GlobalFunction::$date;
        $options = array(
            'model'=>'Sservice',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"$search",
                    'order'=>'t.`open` DESC',
                ),
                'pagination'=>false,
            ),
            'all'=>true,
        );
        return NDataAction::insertMemcacheDataByTags($options,"","5884提醒您没有相关{$info}!");
    }
    public function kaifuData($d){
        return TAdapterKaifuData::deal($d);
    }
    
    
    
}

?>
