<?php
$this->breadcrumbs=array(
	'常见公交'=>array('index'),
	'查看该条公交信息'=>array('view','id'=>$model->id),
	'修改',
);

$this->menu=array(
	array('label'=>'List Bus', 'url'=>array('index')),
	array('label'=>'Create Bus', 'url'=>array('create')),
	array('label'=>'View Bus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Bus', 'url'=>array('admin')),
);
?>

<h1>&nbsp&nbsp常用公交信息修改</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>