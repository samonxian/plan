<?php
$this->breadcrumbs=array(
	'Takeouts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Takeout', 'url'=>array('index')),
	array('label'=>'Create Takeout', 'url'=>array('create')),
	array('label'=>'View Takeout', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Takeout', 'url'=>array('admin')),
);
?>

<h1>Update Takeout <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>