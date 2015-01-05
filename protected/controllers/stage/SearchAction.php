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
class SearchAction extends StageAction{
    //put your code here
    
    public function run() {
        $this->setCustomTags(array(
            'kaifu',
            'search',
        ),'<onlyone>');
       
        $this->setCustomTags(array(
        ),'[]');
        
        if(isset($_POST['keyword'])){
			// header("Content-type:text/html;charset=utf-8");
			// $_POST['keyword'] = iconv('gbk','utf-8',$_POST['keyword']);
			$url = Yii::app()->createUrl("stage/search",array(
                "keyword"=>$_POST['keyword'],
            ));
			// $_GET["keyword"] = $_POST['keyword'];
			header("Location: $url");
            // $this->controller->render('search');
        }else{
            if(!isset($_GET["keyword"])) return;
			$_GET["keyword"] = urldecode($_GET["keyword"]);
            $this->controller->render('search');
        }
    }
    public function tagLnav(){
        $t=array(
            '$nav_num'=>'3',
        );
        return NDataAction::insertCustomDatasByTags($t);
    }
    
    public function search2($type=""){
        $min = date('H');
        $search = "MATCH(t.`nomi_font`) AGAINST ('$min' IN BOOLEAN MODE) and to_days(t.`open`)=to_days(now())";//当天
        return $search;
    }
    
    public function tagKaifu($info="开服信息"){
        $search = $this->search2('count');
        $date = GlobalFunction::$date;
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
    
    public function tagSearch($info="开服信息"){
        
        $search = "t.`name` = '{$_GET["keyword"]}'";
        $date = GlobalFunction::$date;
        $options = array(
            'model'=>'Sservice',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"$search",
                    'order'=>'t.`open` DESC',
                ),
                'pagination'=>array(
                    'pageSize'=>20
                ),
            ),
            'all'=>true,
        );
        //设置开服量
        $gameObj = Game::model()->find("name=:id",array(':id'=>$_GET["keyword"]));
        if($gameObj){
            $p = array();
            $p["Game"]['search'] = $gameObj->search + 1;
            if(Tglobal::isToReset()){
                $p["Game"]['searchprevweek'] = $gameObj->searchprevweek + 1;
            }else{
                $p["Game"]['searchthisweek'] = $gameObj->searchthisweek + 1;
            }
           $gameObj->attributes=$gameObj->setAttributes($p['Game'],false);
    //                    var_dump($gameObj->attributes);
           $gameObj->saveAttributes($gameObj->attributes);
        }
        $html = NDataAction::insertMemcacheDataByTags($options,"","5884提醒您,没有相关{$info}!");
        return $html;
    }
    public function searchData($d){
        return TAdapterKaifuData::deal($d);
    }
}

?>
