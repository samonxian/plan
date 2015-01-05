<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Administrator
 */
interface NActiveRecordInterface {
    //put your code here
     /**
     * 定义数据库中字段在后台的表现类型
     * @return 已定义的字段类型数组
     */
     public abstract function fieldType();
      /**
     * 对类型为chosen的字段，添加项目
     * @return 已定义的各个字段chosen选项数组
     */
     public abstract function chosen();
}

?>
