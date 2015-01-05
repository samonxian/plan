<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 开服表前台数据适配器
 *
 */
class TAdapterKaifuData {
    /**
     * 适配处理
     * @param CModel $d 开服model对象
     * @param array $t model属性没有情况下，新增外部属性
     */
    public function deal($d,$t=array()){
        $open = TAdapterKaifuData::dealOpen($d['open']);
        
        $t['$time'] = substr($d['open'],11,2); 
        if((int)$t['$time'] < 10){
            $t['$time'] = substr($d['open'],12,1);
        }
        $t['$model'] = $open['open'];
        $t['$class'] = $open['class'];
        $chosen = $d->chosen();
        $d['type'] = $chosen['type'][$d['type']];
        $d['name'] = GlobalFunction::substrcn($d['name'], '6','...');
        $time = explode(' ', $d['open']);
        $m_d = explode('-', $time[0]);
        $time2 = explode(':', $time[1]);
        if($open['d']!=date('d'))
            $d['open'] = $m_d[1].'月'.$m_d[2].'日 '.$time2[0].':'.$time2[1];
        else $d['open'] = "今天 ".$time2[0].':'.$time2[1];
        $t['$gift'] = '';
        $t['$activity'] = '-';
        return $t;
    }
    /**
     * 处理开服时间
     */
    public function dealOpen($open){
        $t = array();
        $d = date("d");	$h= date("H");	$i = date("i");
        $date = explode("-",$open);
        $date = explode(" ",$date[2]);
        $hour = explode(":",$date[1]);
        $d2 = $date[0]; $h2 = $hour[0]; $i2 = $hour[1];
        $t['d'] = $d2;
        $start = mktime($h, $i);
        $end = mktime($h2, $i2);
        
        $time = round(abs(($end-$start)/3600)).'小时';
        if($time==0) $min = round(abs(($end-$start)/60)).'分钟';
        if($d<$d2) {
            $t['open'] = "未开服";
            $t['class'] = "will";
        }else if($d>$d2){
            $t['open'] = "已开服";
            $t['class'] = "opened";
        }else{
            if($end>$start){
                if($time==0) $t['open'] = $min.'后开服';
                else $t['open'] = $time.'后开服';
                $t['class'] = "will";
            }else{
                if($time==0) $t['open'] = '刚刚开服'.$min;
                else $t['open'] = '已开服'.$time;
                $t['class'] = "opened";
            }
        }
        return $t;
    }
    
    /**
     * 开服游戏列表适配处理
     * @param CModel $d 开服model对象
     * @param array $t model属性没有情况下，新增外部属性
     */
    public function dealGame($d,$t=array()){
        $d['name'] = GlobalFunction::substrcn($d['name'], '6','...');
        $get = $_GET;
        $get['game'] = $d['g_id'];
        $t['$created'] = $d['created'];
        $t['$url'] = $this->controller->createUrl("stage/kaifu",$get);
        return $t;
    }
    
}

?>
