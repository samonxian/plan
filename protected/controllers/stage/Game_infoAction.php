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
class Game_infoAction extends StageAction{
    public $g_name;
    public $platform_all;
    public $kaifuNum;
    //put your code here
    public function run() {
        $this->setCustomTags(array(
            'info',
            'operator',
            'open',
        ),'<onlyone>');
        $this->setCustomTags(array(
            'g_name',
            'operatorNum',
        ),'{$}');
        $this->nVar['platform_all'] = $this->controller->createUrl('stage/game_info',array('id'=>$_GET['id']));
        $this->controller->render('game_info');
    }
    
    public function tagOpen(){
        $p_id = "";
        if(isset($_GET['operator'])){
            $p_id = 'and t.`p_id`='.$_GET['operator'];
            $m_p = $_GET['operator'];
        }else{
            $m_p = '';
        }
        if(isset($_GET['Sservice_page'])) $m_s = $_GET['Sservice_page'];
            else $m_s = '';
        
        $date = GlobalFunction::$date;
        $options = array(
            'model'=>'Sservice',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"t.`g_id`={$_GET['id']} $p_id",
                    'order'=>'t.`created` DESC',
                ),
                'pagination'=>array(
                    'pageSize'=>1,
                ),
            ),
            'all'=>true,
        );
        
        return NDataAction::insertMemcacheDataByTags($options,$m_p.$m_s,"5884提醒您没有相关游戏开服!");
    }
    
    public function openPager($pagination){
        $html =  $this->controller->widget('ext.widgets.NLinkPager',$this->setPagerOptions($pagination),true);
        return $html;
    }
    
    public function openData($d){
        return TAdapterKaifuData::deal($d);
    }
    
    public function tagInfo(){
        $m = $this->getTagContents('info');
        if(isset($m[0])){
            $model = Game::model()->findByPk($_GET['id']);
            //存储点击次数
            $post['game'] = $model->click+1;
//            $model->setAttributes($post['game'], false);
            $logoPath = $model->getFilePath(null,'images')."/".$model->logo;
            $bigimg = $model->getFilePath(null,'images')."/".$model->img;
            $html = Yii::t('nan',$m[0],array(
                '$img'=>$logoPath,
                '$bigimg'=>$bigimg,
                '$name'=>$model->name,
                '$grade'=>$model->estimate,
                '$combat'=>$model->fightform,
                '$state'=>$model->gstate,
                '$develop'=>GlobalFunction::substrcn($model->cCompany, '5','..'),
                '$run'=>GlobalFunction::substrcn($model->rCompany, '5','..'),
                '$type'=>$model->typet,
                '$ui'=>$model->ul,
                '$theme'=>$model->theme,
                '$zhuangtai'=>$model->gstate,
                '$url'=>$model->site,
                '$brief'=>$model->brief,
                '$enter'=>"[进入官网]",
            ));
            $this->g_name = $model->name;
            $this->nVar['kaifuNum'] = $model->num;
             return $html;
        }
    }
    
    public function tagG_name(){
        return $this->g_name;
    }
    
    public function tagOperatorNum(){
        return $this->operatorNum;
    }
    public $operatorNum = 0;
    public function tagOperator(){
        $options = array(
            'model'=>'Pgame',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                    'condition'=>"t.`g_id`={$_GET['id']}",
//                    'order'=>'t.`created` DESC',
                     'with'=>'platform',
                ),
                'pagination'=>false
            ),
//            'all'=>true,
        );
        $operator = 0;
        if(isset($_GET['operator'])) $operator = $_GET['operator'];
        /**运营商高亮**/
        Yii::app()->clientScript->registerScript('operator',"
            $('#operator_id_{$operator}').addClass('hover');
            
        ",CClientScript::POS_END);
        return NDataAction::insertDatasByTags($options,"5884提醒您没有相关运营商");
    }
    public function operatorData($d){
        $t['$name'] = GlobalFunction::substrcn($d->platform[0]->p_name, '5','...');
        $t['$p_id'] = $d->platform[0]->id;
        $t['$url'] = $_GET['id'];
        $this->operatorNum++;
        return $t;
    }
    
    
}

?>
