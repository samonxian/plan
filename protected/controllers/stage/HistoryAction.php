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
class HistoryAction extends StageAction{
    //put your code here
    
    public function run() {
        $this->setCustomTags(array(
            "kaifu",
            "calendar",
        ),'<onlyone>');
       
        $this->setCustomTags(array(
        ),'[]');
		
        $this->controller->render('/stage/history');
    }
    public function tagLnav(){
        $t=array(
            '$nav_num'=>'2',
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
                    'order'=>'t.`open`',
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
    
    public function tagCalendar(){
        if(!isset($_GET['year'])) $_GET['year'] = date("Y");
        if(!isset($_GET['month'])) $_GET['month'] = date("m");
        if(!isset($_GET['day'])) $_GET['day'] = date("d");
        return  $this->controller->widget('ext.calendaronlyphp.SimpleCalendarWidget', array(
            'year' => date("Y"),
            'month' => date("m"),
            'day' => date("d"),
        ),true);
    }
}

?>
