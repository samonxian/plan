<?php
/* @var $this SutuoController */
/* @var $model Sutuo */


$this->breadcrumbs=array(
	'开服管理列表',
);
Yii::app()->clientScript->registerScript('search', "
	$('.search-form form').submit(function(){
	$('#sutuo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	$('#myModal').modal('hide');
		return false;
	});
");

?>
<style>
	.delete{display:none;}
</style>
<a href="#myModal" role="button" class="btn btn-primary search-button"  data-toggle="modal">高级搜索</a>
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
	$nomidate = Tglobal::find(new Nominate,array(
		'created'=>date("Y-m-d"),
		'm_id'=>$data[$key]['m_id'],
		'p_id'=>$data[$key]['p_id'],
		'g_id'=>$data[$key]['g_id'],
		'service'=>$data[$key]['service'],
	));
	// if($nomidate){
		 // $data[$key]['nomi_font'] = $nomidate[0]->nomi_font;
	// }else{
		// $data[$key]['nomi_font'] = "";
	// }
	$data[$key]['service'] = "双线".$data[$key]['service']."区";
    if($d->serviceName=='')
		$data[$key]['service'] = $d->service;
	else $data[$key]['service'] = $d->serviceName;
	$d->nomi_font = str_replace(Tvar::$day_refer[0], '全天', $d->nomi_font);
	$d->nomi_font = str_replace(Tvar::$day_refer[1], '通宵', $d->nomi_font);
}


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
    //'filter'=>$model,
    'columns'=>$labels,
)); ?>
