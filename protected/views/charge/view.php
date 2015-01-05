<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'套餐管理'=>array('index'),	
);

$handlefield = array(
	
);
$chosen = $model->chosen();
foreach($handlefield  as $field){
	$model[$field] = $chosen[$field][$model[$field]];
}

$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'company',
		'date',
		'money',
	),
)); 


?>

