<?php
$this->breadcrumbs=array(
	'外卖'=>array('index'),
	'添加',
);

$this->menu=array(
	array('label'=>'List Takeout', 'url'=>array('index')),
	array('label'=>'Manage Takeout', 'url'=>array('admin')),
);
?>

<h1>&nbsp&nbsp添加外卖信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>