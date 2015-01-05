<?php
/* @var $this PgameController */
/* @var $model Pgame */

$this->breadcrumbs=array(
	'Pgames'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pgame', 'url'=>array('index')),
	array('label'=>'Manage Pgame', 'url'=>array('admin')),
);
?>

<h1>Create Pgame</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>