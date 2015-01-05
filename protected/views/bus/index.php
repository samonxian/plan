<?php
$this->breadcrumbs=array(
    '公司管理',
);

?>
<?php 
    $urlPrefix='Yii::app()->createUrl("/'.$modelName    .'/';
    $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped',
        'dataProvider'=>$dataProvider,
        'template'=>"{items}{pager}",
        'pager'=>array(
            'class'=>'bootstrap.widgets.TbPager',
            'displayFirstAndLast'=>true,
            'firstPageLabel'=>'第一页',
            'prevPageLabel'=>'上一页;',
            'nextPageLabel'=>'下一页',
            'lastPageLabel'=>'最后一页',
        ),
        'columns'=>array(
            array('name'=>'start', 'header'=>'First name'),
            array('name'=>'end', 'header'=>'Last name'),
            array('name'=>'road', 'header'=>'Language'),
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'header'=>'审核',
                'updateButtonUrl'=>$urlPrefix.'update",array("id"=>$data->primaryKey))',
                'deleteButtonUrl'=>$urlPrefix.'delete",array("id"=>$data->primaryKey))',
                'viewButtonUrl'=>$urlPrefix.'view",array("id"=>$data->primaryKey))',
                'viewButtonOptions'=>array(
                        'style'=>'display:none;',
                ),
            ),
        ),
    )); 
?>