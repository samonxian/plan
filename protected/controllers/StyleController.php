<?php

class StyleController extends Controller
{
	public $layout='';

	/**
	 * Declares class-based actions.
	 */
	public function actions()	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public function actionCombine(){
		$host = $_SERVER['HTTP_HOST'];//获取域名
		$in =  $_SERVER['REQUEST_URI'];//获取处域名外的其他url
		$in = str_replace("=", "=http://".$host, $in);//插入域名
		$ins = explode("=", $in);		
		unset($ins[0]);//去掉第一个
		$contents = "";
		foreach ($ins as $key => $value) {
			$contents .= file_get_contents($value);
		}		
		if(strstr($in,"debug")){
			$contents = JSMin::minify($contents);
		}
		echo $contents;
	}
}
