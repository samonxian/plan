<?php
/* @var $this SserviceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sservices',
);

$this->menu=array(
	array('label'=>'Create Sservice', 'url'=>array('create')),
	array('label'=>'Manage Sservice', 'url'=>array('admin')),
);
?>

<h1>Sservices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
