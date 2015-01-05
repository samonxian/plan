<?php
/* @var $this LinkmanController */
/* @var $model Linkman */

$this->breadcrumbs=array(
	'Linkmen'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Linkman', 'url'=>array('index')),
	array('label'=>'Create Linkman', 'url'=>array('create')),
	array('label'=>'Update Linkman', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Linkman', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Linkman', 'url'=>array('admin')),
);
?>

<h1>View Linkman #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'c_name',
		'post',
		'c_qq',
		'c_tel',
		'c_show',
		'p_id',
	),
)); ?>
