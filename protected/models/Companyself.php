<?php

/**
 * This is the model class for table "{{company}}".
 *
 * The followings are the available columns in table '{{company}}':
 * @property integer $id
 * @property string $name
 * @property string $user
 * @property string $initial
 * @property string $name_pin
 * @property integer $examine
 * @property integer $mid
 * @property string $pwd
 * @property string $code
 * @property string $short
 * @property string $url
 * @property string $belong
 * @property string $tel
 * @property string $zip_code
 * @property string $fax
 * @property string $mail
 * @property string $article_num
 * @property string $article_d_thumb
 * @property string $icp
 * @property string $icp_d_thumb
 * @property string $address
 * @property string $f_time
 * @property integer $ismarket
 * @property integer $net_vote
 * @property string $business
 * @property string $about_src
 * @property string $logo_thumb
 * @property string $created
 */
class Companyself extends Company {
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    public function attributeAddLabels() {
        return array(
            'name' => '公司名称',
            'short' => '公司简称',
            'user' => '用户名',
            'f_time' => '成立时间',
            'logo_thumb' => '公司Logo',
            'url' => '公司网址',
            'address' => '公司地址',
            'belong' => '所属地区',
            'mail' => '电子邮箱',
            'tel' => '客服电话',
            'fax' => '传真电话',
            'about_src' => '公司简介',
            'business' => '主营业务',
            'zip_code' => '邮政编码',
            'article_num' => '文网文号', 
            'article_d_thumb' => '文网文号扫描件',
            'icp' => 'ICP许可证号',
            'icp_d_thumb' => 'ICP许可证扫描件',
            'ismarket' => '是否上市',
        );
    }
    
}