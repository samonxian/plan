<?php
$this->breadcrumbs=array(
	'常用公交'=>array('index'),
	'添加',
);

$this->menu=array(
	array('label'=>'List Bus', 'url'=>array('index')),
	array('label'=>'Manage Bus', 'url'=>array('admin')),
);
?>

<h1>&nbsp&nbsp添加常用公交</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>