<?php

class StyleController extends Controller
{
	public $layout='';

	/**
	 * Declares class-based actions.
	 */
	public function actions(){
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
	/**
	*	�ϲ����js��ȥ�������ע�͡����С��ո��
	*/
	public function actionCombine(){
		$host = $_SERVER['HTTP_HOST'];//��ȡ����
		$in =  $_SERVER['REQUEST_URI'];//��ȡ�������������url
		$in = str_replace("=", "=http://".$host, $in);//��������
		$ins = explode("=", $in);		
		unset($ins[0]);//ȥ����һ��
		$contents = "";
		foreach ($ins as $key => $value) {
			$contents .= file_get_contents($value);			
		}		
		if(strstr($in,"debug")){
			$contents = JSMin::minify($contents);
			$contents = str_replace("}\n", "};", $contents);
			$contents = str_replace("\n", "", $contents);
		}
		echo $contents;
	}
}
