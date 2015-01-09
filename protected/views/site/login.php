<?php
/* @var $this DefaultController */
/* @var $model LoginForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::t('YcmModule.ycm','Login');
$this->breadcrumbs=array(
	Yii::t('YcmModule.ycm','登陆'),
);

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'verticalForm',
	'type'=>'inline',
	'htmlOptions'=>array('class'=>'well'),
));

echo '<p>'.Yii::t('YcmModule.ycm','请输入用户名和密码').'</p>';
echo $form->textFieldRow($model,'username',array('class'=>'input-medium','prepend'=>'<i class="icon-user"></i>')).' ';
echo $form->passwordFieldRow($model,'password',array('class'=>'input-medium','prepend'=>'<i class="icon-lock"></i>')).' ';
$this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','label'=>'Login'));
echo '<br />'.$form->checkboxRow($model,'rememberMe');
$this->endWidget();

