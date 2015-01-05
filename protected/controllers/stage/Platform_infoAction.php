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
class Platform_infoAction extends StageAction{
    //put your code here
    public function run() {
        $this->setCustomTags(array(
            'info',
            'contact',
            'mygame',
        ),'<onlyone>');
         $this->setCustomTags(array(
            'p_name',
        ),'{$}');
        $this->controller->renderWithTags('platform_info');
       
    }
    public $p_name;
    public function tagP_name(){
        return $this->p_name;
    }
    
    public function tagInfo(){
          return NDataAction::insertDatasByTagsPK($_GET['id']);
    }
    
    public function infoData($d){
        $this->p_name = $d["p_short"];
        $logoPath = $d->getFilePath(null,'images')."/".$d->p_logo_thumb;
        $d['p_logo_thumb'] = $logoPath;
        $pgame = new Pgame();
        $t['$count'] = $pgame->count('`p_id`='.$_GET['id']);
        return $t;
    }
    
    
    public function tagContact(){
        $m = $this->getTagContents('contact');
        if(isset($m[0])){
            $dataProvider = new CActiveDataProvider('Linkman',array(
                'criteria'=>array(
                    'condition'=>'t.`p_id`='.$_GET['id'],
                    'order'=>'t.`id` DESC',
                    'with'=>array(
                        'company'
                    ),
                ),
            ));
            $data = $dataProvider->getData();
           
            if(!empty ($data)){
                $html = Yii::t('nan',$m[0],array(
                    '$name'=>$data[0]['c_name'],
                    '$post'=>$data[0]['post'],
                    '$qq'=>$data[0]['c_qq'],
                    '$tel'=>$data[0]['c_tel'],
                    '$city'=>$data[0]->company['address'],
                ));
            }else{
                $html = $m[0];
            }
            return $html;
        }
    }
    
    public function tagMygame(){
        $options = array(
            'model'=>'Pgame',
            'dataProviderOptions'=>array(
                 'criteria'=>array(
                     'condition'=>'t.`p_id`='.$_GET['id'],
                     'with'=>array(
                         'game',
                     ),
                ),
                'pagination'=>false,
            ),
        );
        return NDataAction::insertDatasByTags($options,'5884提醒您没有相关游戏！');
    }
    
    public function mygameData($d){
        $t['$name'] = $d->game->name;
        $t['$g_id'] = Yii::app()->createUrl('stage/game_info',array('id'=>$d->game->id));
        $t['$logo'] = $logoPath = $d->game->getFilePath(null,'images')."/".$d->game->logo;
        $chosen = $d->game->chosen();
        $t['$typet'] = $chosen['typet'][$d->game->typet];
        return $t;
    }
    
}

?>
