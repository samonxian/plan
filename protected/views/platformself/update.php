<?php
/* @var $this PlatformController */
/* @var $model Platform */

$this->breadcrumbs=array(
	'Platforms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>