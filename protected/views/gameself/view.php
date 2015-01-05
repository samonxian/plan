<?php
/* @var $this PinfoController */
/* @var $model Pinfo */

$this->breadcrumbs=array(
	'Pinfos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Pinfo', 'url'=>array('index')),
	array('label'=>'Create Pinfo', 'url'=>array('create')),
	array('label'=>'Update Pinfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pinfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pinfo', 'url'=>array('admin')),
);
?>

<h1>View Pinfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'typeo',
		'system',
		'relative',
		'cCompany',
		'rCompany',
		'site',
		'downaddress',
		'platform',
		'typet',
		'theme',
		'ul',
		'fightform',
		'gstate',
		'chargingMode',
		'address',
		'img',
	),
)); ?>
