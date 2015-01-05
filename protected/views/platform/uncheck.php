<?php
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('validform',"
    seajs.use('$baseUrl/js/admin/validform.js');
",CClientScript::POS_END);

$this->breadcrumbs=array(
    '平台审核管理',
);
$this->widget('ext.widgets.NSearch',array(
    'dataProvider'=>$options['dataProvider'],
));
 $this->widget('ext.widgets.NSearchByLetter',array(
        'target_filed'=>'initial',
    ));
?>
<script>
    
</script>
<?php
    $urlPrefix='Yii::app()->createUrl("/'.$modelName.'/';
    $this->widget('ext.mylib.NGridView',$options); 
?>
    
   