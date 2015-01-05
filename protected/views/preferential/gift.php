<?php
/* @var $this SutuoController */
/* @var $model Sutuo */


$this->breadcrumbs=array(
	'套餐管理'=>array('admin'),
	'礼包套餐列表',
);

Yii::app()->clientScript->registerScript('search', "
    $('.control-group').hide();
    var showField = ['permoney','savemoney','term','money','mealnumber'];
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

<?php 
$dataProvider = $model->search();
$data = $dataProvider->data;
$chosen = $model->chosen();
foreach($data as $key=>$d){
    $data[$key]['type'] = $chosen['type'][$d['type']];
}
$attributes = $model->attributeAdminLabels();

$labels = array_keys($attributes);

$labels[] = array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    'header'=>'操作',
);
$this->widget('ext.widgets.NGridView', array(
    'id'=>'sutuo-grid',
    'dataProvider'=>$dataProvider,
    //'filter'=>$model,
    'columns'=>$labels,
)); 

$this->renderPartial('/remark/remark',array('remark'=>$remark));
?>

