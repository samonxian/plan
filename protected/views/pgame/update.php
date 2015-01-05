<?php
/* @var $this PgameController */
/* @var $model Pgame */

$this->breadcrumbs=array(
	'Pgames'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pgame', 'url'=>array('index')),
	array('label'=>'Create Pgame', 'url'=>array('create')),
	array('label'=>'View Pgame', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pgame', 'url'=>array('admin')),
);
?>

<h1>Update Pgame <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>