<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping  user login form data.
 * It is used by the 'login' action of 'DefaultController'.
 */
class PlatformRegisterForm extends CFormModel {
    public $user;
    public $mail;
    public $pwd;
    public $repeatpwd;
    public $c_name;
    public $post;
    public $c_qq;
    public $c_tel;
    public $name;
    public $short;
    //public $post;
    public $url;
    public $address;
    public $tel;
    public $city;
    public $logo_thumb;
    public $about_src;
    public $p_name;
    public $p_short;
    public $p_address;
    public $p_logo_thumb;
    public $brief;
    public $verifyCode;
    public $checkbox;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
 
  
    public function rules() {
        return array(
          array('verifyCode', 'captcha', 'allowEmpty'=> !extension_loaded('gd')), 
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            //注册第一部分（基本信息标签）           
            'user' =>'登陆用户：<span class="sign">*</span>',
            'mail' =>'电子邮箱：<span class="sign">*</span>',
            'pwd' =>'登陆密码：<span class="sign">*</span>',
            'repeatpwd' =>'确认密码：<span class="sign">*</span>',
            //（联系人信息）     
            'c_name' =>'&nbsp;&nbsp;联系人：<span class="sign">*</span>',
            'post' =>'担任职位：<span class="sign">*</span>',
            'c_qq' =>'&nbsp;&nbsp;联系QQ：<span class="sign">*</span>',
            'c_tel' =>'联系电话：<span class="sign">*</span>',
            //注册第二部分(公司信息)
            'name' =>'公司名称：<span class="sign">*</span>',
            'short' =>'公司简称：<span class="sign">*</span>',
            'url' =>'公司网址：<span class="sign">*</span>',
            'address' =>'公司地址：<span class="sign">*</span>',
            'tel' =>'客服电话：<span class="sign">*</span>',
            'city' =>'所在城市',
            'logo_thumb' =>'&nbsp;公司LOGO：',
            'about_src' =>'&nbsp;公司简介：',
            //注册第三部分
            'p_name' =>'平台名称：<span class="sign">*</span>',
            'p_short' =>'平台简称：<span class="sign">*</span>',
            'p_address' =>'平台网址：<span class="sign">*</span>',
            'p_logo_thumb' =>'&nbsp;平台LOGO：<span class="sign">*</span>',
            'brief' =>'&nbsp;平台简介：<span class="sign">*</span>',
            'verifyCode' =>'&nbsp;&nbsp;&nbsp;验证码：',
        );
    }

}