<?php
/* @var $this PinfoController */
/* @var $model Pinfo */

$this->breadcrumbs=array(
	//'Pinfos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>