<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'开服管理'=>array('admin'),
	'推荐费用编辑',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>