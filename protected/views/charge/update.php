<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'Sservices'=>array('index'),
	//$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>
<?php
    echo $this->renderPartial('_form', array('model'=>$model));
?>