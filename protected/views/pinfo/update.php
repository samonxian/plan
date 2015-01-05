<?php
/* @var $this PinfoController */
/* @var $model Pinfo */

$this->breadcrumbs=array(
	'Pinfos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pinfo', 'url'=>array('index')),
	array('label'=>'Create Pinfo', 'url'=>array('create')),
	array('label'=>'View Pinfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pinfo', 'url'=>array('admin')),
);
?>

<h1>Update Pinfo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>