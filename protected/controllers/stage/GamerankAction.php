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
class GamerankAction extends StageAction{
    
    public function run() {
		$this->setCustomTags(array(
            'kaifu',
        ),'<onlyone>');
        $this->setCustomTags(array(
            'url',
        ),'[]');
        $this->controller->render('gamerank');
    }
    
    public function tagLnav(){
        $t=array(
            '$nav_num'=>'1',
        );
        return NDataAction::insertCustomDatasByTags($t);
    }
	public function tagUrl(){
        $get = $_GET;
        $num = 0;
        if(isset($_GET['platform'])){
            $key = array_flip(TData::$platform_type);
            $num = $key[$_GET['platform']];
        }
        Yii::app()->clientScript->registerScript('tagUrl',"
            var co = $('.j_tyles');
            for (var i in co){
                $('a:eq({$num})',co[i]).addClass('on');
            }
        ",CClientScript::POS_END);
        

        foreach(TData::$platform_type as $key=>$p){
            if($key!=0) $get['platform'] = $p;
            else unset($get['platform']);
            $t[TData::$platform_tag[$key]] = $this->controller->createUrl('stage/gamerank',$get);
        }
        return NDataAction::insertCustomDatasByTags($t);
    }
	public function search(){
        $search = "";
        if(isset($_GET['platform'])) 
			$search = "t.`platform_type`='{$_GET['platform']}'";
        return $search;
    }
    
    public function tagKaifu($info="开服信息"){
        $search = $this->search();
        $date = GlobalFunction::$date;
        $options = array(
            'model'=>'Sservice',
            'dataProviderOptions'=>array(
                'criteria'=>array(
                    'condition'=>"$search",
                    'order'=>'t.`players` DESC',
                ),
                'pagination'=>false,
            ),
            'all'=>true,
        );
        return NDataAction::insertMemcacheDataByTags($options,"","5884提醒您没有相关{$info}!");
    }
	public $i = 1;
    public function kaifuData($d){
		$t = array(
			'$rank'=> $this->i++,
		);
        return TAdapterKaifuData::deal($d,$t);
    }
	
}

?>
