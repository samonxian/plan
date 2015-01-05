<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'开服管理'=>array('admin'),
	'添加开服',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>