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
class RankAction extends StageAction{
    //put your code here
    
    public function run() {
        $this->setCustomTags(array(
            'kaifu',
            'open',
            'click',
            'search',
        ),'<onlyone>');
       
        $this->setCustomTags(array(
        ),'[]');
		
        $this->controller->render('/stage/rank');
    }
    public function tagLnav(){
        $t=array(
            '$nav_num'=>'3',
        );
        return NDataAction::insertCustomDatasByTags($t);
    }
    public $i = 1;
    public function tagOpen($info="信息"){
        $order = "t.`openprevweek` DESC";
        if(Tglobal::isToReset()){
            $order = "t.`openthisweek` DESC";
        }
        $options = array(
            'model'=>'Game',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"",
                    'order'=>$order,
                ),
                'pagination'=>array(
                    'pageSize'=>10
                ),
            ),
            'all'=>true,
        );
        return NDataAction::insertMemcacheDataByTags($options,"","5884提醒您没有相关{$info}!");
    }
    
    public function openData($d){
        $t['$i'] = $this->i++;
        if(Tglobal::isToReset()){
            $d['open'] = $d['openthisweek'];
        }else{
             $d['open'] = $d['openprevweek'];
        }
        return $t;
    }
    
    public $k = 1;
    public function tagClick($info="信息"){
        $order = "t.`clickprevweek` DESC";
        if(Tglobal::isToReset()){
            $order = "t.`clickthisweek` DESC";
        }
        $options = array(
            'model'=>'Game',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"",
                    'order'=>$order,
                ),
                'pagination'=>array(
                    'pageSize'=>10
                ),
            ),
            'all'=>true,
        );
        return NDataAction::insertMemcacheDataByTags($options,"","5884提醒您没有相关{$info}!");
    }
    
    public function clickData($d){
        $t['$k'] = $this->k++;
       
        if(Tglobal::isToReset()){
            $d['click'] = $d['clickthisweek'];
        }else{
             $d['click'] = $d['clickprevweek'];
        }
        return $t;
    }
    
    public $j = 1;
    public function tagSearch($info="信息"){
        $order = "t.`searchprevweek` DESC";
        if(Tglobal::isToReset()){
            $order = "t.`searchthisweek` DESC";
        }
        $options = array(
            'model'=>'Game',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"",
                    'order'=>$order,
                ),
                'pagination'=>array(
                    'pageSize'=>10
                ),
            ),
            'all'=>true,
        );
        return NDataAction::insertMemcacheDataByTags($options,"","5884提醒您没有相关{$info}!");
    }
    
    public function searchData($d){
        $t['$j'] = $this->j++;
        if(Tglobal::isToReset()){
            $d['search'] = $d['searchthisweek'];
        }else{
            $d['search'] = $d['searchprevweek'];
        }
        return $t;
    }
    
    public function search2($type=""){
        $min = date('H');
        $search = "t.`nomi_font` LIKE '%$min%' and to_days(t.`open`)=to_days(now())";//当天
        return $search;
    }
    
    public function tagKaifu($info="开服信息"){
        $search = $this->search2();
        $options = array(
            'model'=>'Sservice',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"$search",
                    'order'=>'RAND()',
                ),
                'pagination'=>array(
                    'pageSize'=>15
                ),
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
