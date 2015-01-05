<?php
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('validform',"
    seajs.use('$baseUrl/js/admin/validform.js');
",CClientScript::POS_END);

$this->breadcrumbs=array(
    '管理平台',
);
//$this->widget('ext.widgets.NSearch',array(
//    'dataProvider'=>$options['dataProvider'],
//));
?>
<script>
    
</script>
<?php
    $urlPrefix='Yii::app()->createUrl("/'.$modelName.'/';
    $this->widget('ext.mylib.NGridView',$options); 
?>
    
   