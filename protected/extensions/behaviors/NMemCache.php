<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NMenCache
 *
 * @author Administrator
 */
class NMemCache extends CBehavior{
    //put your code here
    public $openMemCache = false;//开启memcache或memcached缓存功能
    public static $time_min = 60;//一分钟
    public static $half_time_hour = 1800;//半小时
    public static $time_hour = 3600;//一小时
    public static $half_time_day = 21600;//半天
    public static $time_day = 43200;//一天
    
    public function __construct() {
        
    }
}

?>
