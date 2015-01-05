
<?php
/* @var $this CompanyController */
/* @var $model Company */


$this->breadcrumbs=array(
	'游戏管理'=>array('index'),
	'添加',
);
?>

<?php 
    echo $this->renderPartial('_form', array(
        'model'=>$model,
    )); 
 ?>