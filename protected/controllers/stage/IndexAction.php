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
class IndexAction extends StageAction{
    //put your code here
    
    public function run() {
        $this->setCustomTags(array(
            "kaifu",
            "kaifu2",
            "calendar",
            "night",
            "links",
        ),'<onlyone>');
       
        $this->controller->render('/stage/index');
    }
    public function tagLnav(){
        $t=array(
            '$nav_num'=>'0',
        );
        return NDataAction::insertCustomDatasByTags($t);
    }
    
    
    
    /**
     * 今日开服
     */
    public function tagKaifu($info="开服信息"){
        $search = $this->search();
        $date = GlobalFunction::$date;
        $options = array(
            'model'=>'Sservice',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"$search",
                    'order'=>'t.`open`,t.`nominate` DESC,RAND()',
                    
                ),
                'pagination'=>false,
            ),
            'all'=>true,
        );
        return NDataAction::insertMemcacheDataByTags($options,"","");
    }
    public function kaifuData($d){
        return TAdapterKaifuData::deal($d);
    }
	/**
     * 今日开服
     */
    public function tagKaifu2($info="开服信息"){
        $search = $this->search('jintianOld');
        $date = GlobalFunction::$date;
        $options = array(
			'model'=>'Sservice',
			'dataProviderOptions'=>array(
				'criteria'=>array(
					'condition'=>"$search",
					'order'=>'t.`open` DESC,RAND()',
				),
				'pagination'=>false,
			),
			'all'=>true,
        );
        return NDataAction::insertMemcacheDataByTags($options,"","");
    }
    public function kaifu2Data($d){
        return TAdapterKaifuData::deal($d);
    }
    /**
     * 通宵开服
     */
    public function tagNight($info="开服信息"){
        $search = $this->search();
        $date = GlobalFunction::$date;
        $time1 = date("Y-m-d 22:00");
        $time2 = date("Y-m-d 08:00");
        $options = array(
            'model'=>'Sservice',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"$search and (t.`open` > '$time1' or t.`open` < '$time2')",
                    'order'=>'t.`open` and RAND()',
                ),
                'pagination'=>false,
            ),
            'all'=>true,
        );
        return NDataAction::insertMemcacheDataByTags($options,"","5884提醒您没有相关{$info}!");
    }
    public function nightData($d){
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
	
	public function tagLinks(){
		
        $options = array(
			'model'=>'Links',
			'dataProviderOptions'=>array(
				'criteria'=>array(
					'condition'=>"",
					'order'=>'',
				),
				'pagination'=>false,
			),
			'all'=>true,
        );
        return NDataAction::insertMemcacheDataByTags($options,"","5884提醒您没有相关友情链接!");
	}
	
}

?>
