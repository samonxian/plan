<style>
/*	.update{display:none;}*/
</style>
<?php
/* @var $this SutuoController */
/* @var $model Sutuo */

$this->breadcrumbs=array(
	'开服管理'=>array('admin'),
	'开服列表',
);
?>

<?php
    $dataProvider = $options['dataProvider'];
    $this->widget('ext.widgets.NSearch',array(
        'dataProvider'=>$dataProvider,
    ));
?>

<?php
    $data = $dataProvider->getData();
    foreach($data as $i=>$d){
        if($d->serviceName=='')
            $data[$i]['service'] = '双线'.$d->service."区";
        else $data[$i]['service'] = $d->serviceName;
        $d->nomi_font = str_replace(Tvar::$day_refer[0], '全天', $d->nomi_font);
	$d->nomi_font = str_replace(Tvar::$day_refer[1], '通宵', $d->nomi_font);
    }
//    var_dump($options['columns']);
    //$urlPrefix='Yii::app()->createUrl("/'.get_class($data[0]).'/';
    $options['columns'][count($options['columns'])-1] = array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'header'=>'操作',
            'updateButtonUrl'=>'Yii::app()->createUrl("company/login",array("id"=>$data->m_id,"Sservice_update"=>$data->primaryKey))',
            
        );
    $this->widget('ext.mylib.NGridView',$options); 
?>