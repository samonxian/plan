<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of platformRegisterAction
 *
 * @author micheal
 */
class PlatformRegisterAction extends LoginregisterAction{
    //put your code here
    public function run() {
		$state = 0;
		if(isset($_POST['PlatformRegisterForm'])){
			$company = new Company();
                        
			$_POST['PlatformRegisterForm']["name_pin"] = GlobalFunction::cn2pinyin($_POST['PlatformRegisterForm']["name"]);//拼音
			$_POST['PlatformRegisterForm']['initial'] = ucfirst(substr($_POST['PlatformRegisterForm']["name_pin"],0,1));
			if(is_numeric($_POST['PlatformRegisterForm']['initial'])) $_POST['PlatformRegisterForm']['initial'] = 0;
			if(isset($_POST['PlatformRegisterForm']['city']))
				$_POST['PlatformRegisterForm']['city'] .= '-'.$_POST['PlatformRegisterForm']['city1'];
			else $_POST['PlatformRegisterForm']['city'] = '国外-国外';
                        
			$company->save(true,null,'PlatformRegisterForm');
			$m_id = $company->attributes['id'];
 
			$platform = new Platform();
                        
			$_POST["PlatformRegisterForm"]["m_id"] = $m_id;
			$_POST['PlatformRegisterForm']["p_name_pin"] = GlobalFunction::cn2pinyin($_POST['PlatformRegisterForm']["p_name"]);//拼音
			$_POST['PlatformRegisterForm']['initial'] = ucfirst(substr($_POST['PlatformRegisterForm']["p_name_pin"],0,1));
			if(is_numeric($_POST['PlatformRegisterForm']['initial'])) $_POST['PlatformRegisterForm']['initial'] = 0;
                        
			$platform->save(true,null,'PlatformRegisterForm');
			$p_id = $platform->attributes['id']; 
			
			
			$linkman = new Linkman();
			$_POST["PlatformRegisterForm"]["p_id"] = $p_id;
			$linkman->save(true,null,'PlatformRegisterForm');

			
			$this->controller->widget('ext.toastMessage.toastMessageWidget',array(
				'message'=>'注册成功！',
				'type'=>'success',
				'options'=>array(
					'position'=>'middle-center',
					'sticky'=>false
				 )
			));
			$state = 1;
			Yii::app()->user->setFlash('success',Yii::t('Nan','注册成功，请联系QQ 267003691 97534210 开通服务！'));
			$this->controller->redirect("platformLogin");
		}
       $model = new PlatformRegisterForm();
       $this->controller->render('platformRegister',array('model'=>$model,'state'=>$state));
    }
}

?>
