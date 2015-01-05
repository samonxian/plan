<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'常规管理'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'修改',
);


?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>