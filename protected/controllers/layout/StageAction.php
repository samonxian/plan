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
class StageAction extends TagsAction{
    
    public function __construct($controller, $id) {
        parent::__construct($controller, $id);
        $this->setCustomTags(array(
            'lnav',
            'searcht',
        ),'<onlyone>'); 
        $this->setCustomTags(array(
            "count",
        ),'{$}');
    }
    public function tagSearcht(){
        $options = array(
            'model'=>'Game',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"",
                    'order'=>'t.`search` DESC',
                ),
                'pagination'=>array(
                    'pageSize'=>3
                ),
            ),
            'all'=>true,
        );
        return NDataAction::insertMemcacheDataByTags($options,"","");
    }
	
	public function searchtData($d){
		$t = array();
		$t['$name2'] = urlencode($d->name);
		return $t;
	}	
    
    public function search($type=""){
        $g_id = "";
        $platform = "";
        if(isset($_GET['game'])) $g_id = "and t.`g_id`={$_GET['game']}";
        if(isset($_GET['platform'])) $platform = "and t.`platform_type`='{$_GET['platform']}'";
        if(isset($_GET['year'])) {
            $date = $_GET['year'].'-'.$_GET['month'].'-'.$_GET['day'];
            $this->nVar['date'] = $date;
            $search = "to_days(t.`open`)=to_days('{$date}') $g_id $platform";//其他日期
        }else{
            $min = date('Y-m-d H:00');
            $min2 = date('Y-m-d 22:00');
			$h8 = date('Y-m-d 8:00');
            if($type=="count"){
                $search = "to_days(t.`open`)=to_days(now()) $g_id $platform";//当天
            }else if($type=="jintianOld"){
                $search = "to_days(t.`open`)=to_days(now()) $g_id $platform and t.`open` >= '$h8' and t.`open` < '$min'  ";//当天
            }else{
                $search = "to_days(t.`open`)=to_days(now()) $g_id $platform and t.`open` >= '$min' and t.`open` <= '$min2'  ";//当天
            }
	}
        return $search;
    }
    
    public function tagCount(){
        $search = $this->search('count');
        $model = Sservice::model()->count("{$search}");
        return $model;
    }
    public function setPagerOptions($pagination){
        return array(
            'pages' => $pagination, 
            'header'=>'',
            'firstPageLabel'=>'首页',
            'lastPageLabel'=>'末页',
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            'maxButtonCount'=>13,
            'hiddenPageCssClass'=>'disabled',
            'previousPageCssClass'=>'previous_page',
            'nextPageCssClass'=>'next_page',
            'selectedPageCssClass'=>'active',
            'htmlOptions'=>array(
                'class'=>'pagination',
            )
        );
    }
    //put your code here
   
}

?>
