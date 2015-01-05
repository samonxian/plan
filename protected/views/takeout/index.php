<?php
$this->breadcrumbs=array(
	'Takeouts',
);

$this->menu=array(
	array('label'=>'Create Takeout', 'url'=>array('create')),
	array('label'=>'Manage Takeout', 'url'=>array('admin')),
);
?>

<h1>Takeouts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
