
<?php
/* @var $this CompanyController */
/* @var $model Company */
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('validform',"
    seajs.use('$baseUrl/js/admin/validform.js');
",CClientScript::POS_END);

$this->breadcrumbs=array(
	'公司管理'=>array('index'),
	'添加',
);
?>

<?php 
    echo $this->renderPartial('_form', array(
        'model'=>$model,
    )); 
 ?>