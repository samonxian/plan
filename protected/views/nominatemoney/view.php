<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'Sservices'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Sservice', 'url'=>array('index')),
	array('label'=>'Create Sservice', 'url'=>array('create')),
	array('label'=>'Update Sservice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sservice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sservice', 'url'=>array('admin')),
);
?>

<h1>View Sservice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'open',
		'service',
		'type',
		'company',
		'players',
		'gift_id',
		'a_id',
		'g_id',
		'p_id',
		'm_id',
	),
)); ?>
