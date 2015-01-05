<?php
/* @var $this PgameController */
/* @var $model Pgame */

$this->breadcrumbs=array(
	'Pgames'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pgame', 'url'=>array('index')),
	array('label'=>'Create Pgame', 'url'=>array('create')),
	array('label'=>'Update Pgame', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pgame', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pgame', 'url'=>array('admin')),
);
?>

<h1>View Pgame #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'g_id',
		'm_id',
		'g_url',
	),
)); ?>
