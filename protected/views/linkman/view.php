<?php
/* @var $this LinkmanController */
/* @var $model Linkman */

$this->breadcrumbs=array(
	'Linkmen'=>array('index'),
	$model->id,
);


?>


<?php $this->widget('ext..bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'c_name',
		'c_name_pin',
		'initial',
		'post',
		'c_qq',
		'c_tel',
		'c_show',
		'm_id',
		'p_id',
	),
	'htmlOptions'=>array(
            'class'=>'table',
            'style'=>'text-indent:15px;',
        ),
)); ?>
