<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'常规管理'=>array('index'),
	'友情链接列表',
);
?>


<?php 
	$dataProvider = $model->search();
	// $chosen = $model->chosen();
	$data = $dataProvider->data;
	$attributes = $model->attributeAdminLabels();
	$labels = array_keys($attributes);
	$labels[] = array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'header'=>'操作',
	);
	$this->widget('ext.widgets.NGridView', array(
		'id'=>'sutuo-grid',
		'dataProvider'=>$dataProvider,
		//'filter'=>$model,
		'columns'=>$labels,
)); ?>
