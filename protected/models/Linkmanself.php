<?php

/**
 * This is the model class for table "{{linkman}}".
 *
 * The followings are the available columns in table '{{linkman}}':
 * @property integer $id
 * @property string $c_name
 * @property string $post
 * @property string $c_qq
 * @property string $c_tel
 * @property integer $c_show
 * @property integer $p_id
 */
class Linkmanself extends Linkman{
        public static function model($className=__CLASS__){
		return parent::model($className);
	}
        public function attributeAdminLabels() {
            return array(
                'checkbox' => '选择',
                'platform.p_short' => '所属平台',
                'c_name' => '联系人',
                'post' => '担任职务',
                'c_qq' => '联系QQ',
                'c_tel' => '联系电话',
            );
        }
        public function attributeSearchLabels() {
            return array(
               'p_id' => '所属平台',
               'c_name' => '联系人姓名',
                'post' => '职务',
            );
        }
        public function attributeAddLabels() {
            return array(
               'p_id' => '所属平台',
               'c_name' => '联系人姓名',
                'post' => '职务',
                'c_qq' => 'QQ',
                'c_tel' => '联系电话',
            );
        }
}