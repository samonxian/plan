<?php
/* @var $this SutuoController */
/* @var $model Sutuo */


$this->breadcrumbs=array(
	'套餐管理'=>array('admin'),
	'已购套餐列表',
);

Yii::app()->clientScript->registerScript('search', "
    $('.control-group').hide();
    var showField = ['usefultime','money','mealnumber','platform'];
    for(i in showField){
         $('#".get_class($model)."_'+showField[i]).parent().parent().show();
    }
    
    $('.search-form form').submit(function(){
        $('#sutuo-grid').yiiGridView('update', {
            data: $(this).serialize()
        });
        $('#myModal').modal('hide');
        return false;
    });
");
?>
<!--
<a href="#myModal" role="button" class="btn btn-primary search-button"  data-toggle="modal">高级搜索</a>
-->
<div class="search-form absolute">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->
<style>
	.list_{
		font-weight:bold;
	}
</style>
<?php
	 $action_ = array(
        'admin',
		'gift',
    );
	$active_ = array();
    foreach($action_ as $a_){
		if($a_==$this->action->id)
			$active_[] = 'list_';
		else $active_[] = '';
    }
?>
<a class="<?php echo $active_[0];?>" href="<?php echo Yii::app()->createUrl('buymealself/admin');?>">开服套餐消费列表</a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a class="<?php echo $active_[1];?>" href="<?php echo Yii::app()->createUrl('buymealself/gift');?>">礼包套餐消费列表</a>
<?php 
$dataProvider = $model->search();

$data = $dataProvider->data;
$chosen = $model->chosen();
foreach($data as $key=>$d){
   $meal = Tglobal::find(new Preferential,array('id'=>$d['meal_id']));
    $data[$key]['name'] = $meal[0]['name'];
    $data[$key]['money'] = $meal[0]['money'];
    $data[$key]['term'] = $meal[0]['term'];
    $data[$key]['mealnumber'] = $meal[0]['mealnumber'];
    $data[$key]['type'] = $chosen['type'][$d['type']];
	$data[$key]['remaintime'] = Tglobal::remaintime($data[$key]['date'],$data[$key]['term']);
}
$attributes = $model->attributeAdminLabels();

$labels = array_keys($attributes);

// $labels[] = array(
    // 'class'=>'bootstrap.widgets.TbButtonColumn',
    // 'header'=>'操作',
// );
$this->widget('ext.widgets.NGridView', array(
    'id'=>'sutuo-grid',
    'dataProvider'=>$dataProvider,
    //'filter'=>$model,
    'columns'=>$labels,
)); 
?>
