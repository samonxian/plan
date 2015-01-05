<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 开服表前台数据适配器
 *
 */
class TAdapterGameData {
    /**
     * 适配处理
     * @param CModel $d 开服model对象
     * @param array $t model属性没有情况下，新增外部属性
     */
    public function deal($d,$t=array()){
        $chosen = $d->chosen();
        $d['typet'] = $chosen['typet'][$d['typet']];
        $d['cCompany'] = GlobalFunction::substrcn($d['cCompany'], '4','');
        $d['rCompany'] = GlobalFunction::substrcn($d['rCompany'], '4','');
        $d['name'] = GlobalFunction::substrcn($d['name'], '10','..');
        $d['theme'] = GlobalFunction::substrcn($d['theme'], '4','');
        $d['img'] = $logoPath = $d->getFilePath(null,'images')."/".$d['logo'];
        $t['$url'] = Yii::app()->createUrl('stage/game_info',array(
            'id'=>$d['id'],
        ));
        return $t;
    }
    /**
     * 额外处理HotGame的
     * @param CModel $d 开服model对象
     * @param array $t model属性没有情况下，新增外部属性
     */
    public function dealHot($d,$t=array()){
        $t['$i'] = $this->i++;
        $t['$top'] = '';
        if($t['$i']=="1"||$t['$i']=="2"||$t['$i']=="3")
             $t['$top']='top';
        return TAdapterGameData::deal($d,$t);
    }
}

?>
