<?php
$this->breadcrumbs=array(
	'Buses',
);

$this->menu=array(
	array('label'=>'Create Bus', 'url'=>array('create')),
	array('label'=>'Manage Bus', 'url'=>array('admin')),
);
?>

<h1>Buses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
