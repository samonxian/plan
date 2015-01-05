<?php
/* @var $this LinkmanController */
/* @var $model Linkman */

$this->breadcrumbs=array(
	'Linkmen'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Linkman', 'url'=>array('index')),
	array('label'=>'Create Linkman', 'url'=>array('create')),
	array('label'=>'View Linkman', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Linkman', 'url'=>array('admin')),
);
?>

<h1>Update Linkman <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>