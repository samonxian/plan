<?php

/**
 * This is the model class for table "{{pinfo}}".
 *
 * The followings are the available columns in table '{{pinfo}}':
 * @property integer $id
 * @property string $name
 * @property string $typeo
 * @property string $initial
 * @property integer $examine
 * @property string $system
 * @property string $relative
 * @property string $cCompany
 * @property string $rCompany
 * @property string $site
 * @property string $downaddress
 * @property string $platform
 * @property string $typet
 * @property string $theme
 * @property string $ul
 * @property string $fightform
 * @property string $gstate
 * @property string $chargingMode
 * @property string $address
 * @property string $img
 * @property string $created
 */
class Gameself extends Game{
    public static function model($className = __CLASS__) {
        parent::model($className);
    }
    public function attributeSearchLabels() {
        return array(
                'p_id' => 'Name',
                'name' => 'Name',
                'gstate' => '测试状态',
//                'typeo' => 'Typeo',
                'created'=>'date',
            );
    }
    public function attributeAddLabels() {
        
        return array(
            'name' => 'name',
            'typet' => 'Typet',
        );
    }
    public function attributeAdminLabels() {
        return array(
            'checkbox'=>'选择',
            'name' => '游戏名称',
            'typeo'=>'游戏类型',
            'theme' => '主题',
            'theme' => '游戏题材',
            'gstate' => '游戏状态',
            'examine' => '审核状态',
            'created'=>'入库时间',
          // 'chargingMode' => '充值模式',
//               'examine'=>'审核状态',
        );
    }
    
}