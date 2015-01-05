<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'公司信息管理'=>array('index'),
	'完善公司信息',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>