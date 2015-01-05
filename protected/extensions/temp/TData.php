<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TData
 *
 * @author Administrator
 */
class TData {
    //put your code here
    public static $siteName = "5884";
    public static $noResult = "5884提醒您没有相关{data}";
    public static $mode = "0777";
    /**
     * 游戏平台类型
     */
    public static $platform_type = array(
        '全部',
        '手机',
        '网页',
        '客户端',
    );
    /**
     * 游戏平台类型，对应替换标签
     */
    public static $platform_tag = array(
        '$all',
        '$phone',
        '$web',
        '$pc',
    );
}

?>
