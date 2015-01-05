<?php

$this->breadcrumbs=array(
	'开服管理'=>array('index'),
	$model->name,
);


$handlefield = array(
	//'type',
);
$chosen = $model->chosen();
foreach($handlefield  as $field){
	$model[$field] = $chosen[$field][$model[$field]];
}
$model["service"] = "双线".$model["service"]."区";

$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'company',
		'platform',
		'open',
		'service',
		'serviceName',
	),
)); 

?>
