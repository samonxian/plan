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
class GameAction extends StageAction{
    
    public function run() {
        $this->setCustomTags(array(
            'newgame',
            'recogame',
            'hotgame',
            'search',
        ),'<onlyone>');
		
        if(!isset($_GET['platform'])){
            $_GET['platform'] = 0;
            $_GET['letter'] = 0;
            $_GET['type'] = 0;
        }
        $this->controller->render('game');
    }
    
    public function tagLnav(){
        $t=array(
            '$nav_num'=>'5',
        );
        return NDataAction::insertCustomDatasByTags($t);
    }
    
    
    public function tagSearch(){
        $pnum = 0;
        $lnum = 0;
        $tnum = 0;
        if(!isset($_GET['platform'])){
            $_GET['platform'] = 0;
            $_GET['letter'] = 0;
            $_GET['type'] = 0;
        }else{
           
            if($_GET['platform']!="0"){
                $platfrom = array(
                    '全部',
                    '手机',
                    '网页',
                    '客户端',
                );
                $pkey = array_flip($platfrom);
                $pnum = $pkey[$_GET['platform']];
            }
            if($_GET['letter']!="0"){
                $path = Yii::getPathOfAlias('application.data.letter_list');
                $contents = file_get_contents($path.'.txt');
                $letters = explode(';', $contents);
                $lkey = array_flip($letters);
                
                $lnum = $lkey[$_GET['letter']]+1;
            }
            if($_GET['type']!="0"){
                $type = array(
                    '全部',
                    '角色扮演',
                    '战争策略',
                    '模拟经营',
                    '社区养成',
                    '休闲竞技', 
                    '其他类型', 
                );
                $tkey = array_flip($type);
                $tnum = $tkey[$_GET['type']];
            }
        }
        $m = $this->getTagContents('search');
        $html = Yii::t('nan',$m[0],array(
            '$platform'=>$_GET['platform'],
            '$pingyin'=>$_GET['letter'],
            '$type'=>$_GET['type'],
            '$pnum'=>$pnum,
            '$lnum'=>$lnum,
            '$tnum'=>$tnum,
        ));
        return $html;
    }
    
    public function getGameDataProvider($options){
       return new CActiveDataProvider("Game",array(
           "criteria"=>$options
       ));
    }
    
    public function search(){
        $search = '';
        if(isset($_GET['platform'])){
            if($_GET['platform']=="0") $platform = "";
            else $platform = " and t.`typeo`= '{$_GET['platform']}'";
            
            if($_GET['letter']=="0") $letter = "";
            else {
                $lcon = $_GET['letter'];
                if($_GET['letter']=="0-9") $lcon = 0;
                $letter = " and t.`initial`= '$lcon'";
            }
            if($_GET['type']=="0") $type = "";
            else $type = " and t.`typet`= '{$_GET['type']}'";
            $search = $platform.$letter.$type;
        }
        
        return $search;
    }
    
    public function searchByType(){
//        return $this->search();
        $search = '';
        if(isset($_GET['platform'])){
            if($_GET['platform']=="0") {
                $platform = "";
            }else $platform = " and t.`typeo`= '{$_GET['platform']}'";
            
            $search = $platform;
        }
        
        return $search;
    }
    
    
     public function tagRecogame(){
        $search = $this->search();
        $options = array(
            'model'=>'Game',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"t.`examine`=1 $search",
                    'order'=>'t.`created` DESC',
                ),
                'pagination'=>array(
                    'pageSize'=>'6',
                ),
            ),
            'all'=>true,
        );
        TData::$noResult = Yii::t('nan',TData::$noResult,array(
            "{data}"=>"游戏",
        ));
        return NDataAction::insertDatasByTags($options,TData::$noResult);
    }
    public function recogameData($d,$t){
        return TAdapterGameData::deal($d,$t);
    }
    
    public function recogamePager($pagination){
        $html =  $this->controller->widget('ext.widgets.NLinkPager',$this->setPagerOptions($pagination),true);
        return $html;
    }
    
    public function tagNewgame(){
        $search = $this->searchByType();
        $options = array(
            'model'=>'Game',
            'dataProviderOptions'=>array(
                'criteria'=>array(
//                    'condition'=>'t.`examine`=1 and t.`position`=1 '.$search,
                    'condition'=>'t.`examine`=1  '.$search,
                    'order'=>'t.`created` DESC',
                ),
                'pagination'=>array(
                    'pageSize'=>'3',
                ),
            ),
            'all'=>true,
        );
        TData::$noResult = Yii::t('nan',TData::$noResult,array(
            "{data}"=>"游戏",
        ));
        return NDataAction::insertMemcacheDataByTags($options,$_GET['platform'],TData::$noResult);
    }
    
    public function newgameData($d,$t){
        return TAdapterGameData::deal($d,$t);
    }
    
    public function tagHotgame(){
        $search = $this->searchByType();
        $options = array(
            'model'=>'Game',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>'t.`examine`=1'.$search,
                    'order'=>'t.`click` DESC',
                ),
                'pagination'=>array(
                    'pageSize'=>'10',
                ),
            ),  
            'all'=>true,
        );
        TData::$noResult = Yii::t('nan',TData::$noResult,array(
            "{data}"=>"热门游戏",
        ));
        return NDataAction::insertMemcacheDataByTags($options,$_GET['platform'],TData::$noResult);
    }
    
    public $i = 1;
    public function hotgameData($d,$t){
        return TAdapterGameData::dealHot($d,$t);
    }
    
    
}

?>
