<?php
/* @var $this SutuoController */
/* @var $model Sutuo */


$this->breadcrumbs=array(
	'开服管理'=>array('admin'),
	'开服列表',
);

Yii::app()->clientScript->registerScript('search', "
	$('.control-group').hide();
    var showField = ['name','platform','company','gstate'];
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

<a href="#myModal" role="button" class="btn btn-primary search-button"  data-toggle="modal">高级搜索</a>
<div class="search-form absolute">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
$dataProvider = $model->search();

$data = $dataProvider->data;

$attributes = $model->attributeAdminLabels();

$labels = array_keys($attributes);
$labels[] = array(
    'value'=>'eval(" echo \"<a href=#>发号</a>\";")',
    'header'=>'发号',
);
$labels[] = array(
    'value'=>'eval(" echo \"<a href=#>福利</a>\";")',
    'header'=>'福利',
);
$labels[] = array(
    'value'=>'eval(" echo \"<a href=#>活动</a>\";")',
    'header'=>'活动',
);
$labels[] = array(
    'class'=>'bootstrap.widgets.TbButtonColumn',
    'header'=>'操作',
);
$this->widget('ext.widgets.NGridView', array(
    'id'=>'sutuo-grid',
    'dataProvider'=>$dataProvider,
   // 'filter'=>$model,
    'columns'=>$labels,
)); ?>