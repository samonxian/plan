<?php
$this->breadcrumbs=array(
	'Takeouts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Takeout', 'url'=>array('index')),
	array('label'=>'Create Takeout', 'url'=>array('create')),
	array('label'=>'Update Takeout', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Takeout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Takeout', 'url'=>array('admin')),
);
?>

<h1>View Takeout #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'restaurant',
		'slogan',
		'meal_time',
		'support',
		'brief',
		'remark',
		'contact',
		'ps',
		'menu_7',
		'menu_8',
		'menu_9',
		'menu_o',
		'menu_scws',
		'snack',
	),
)); ?>
