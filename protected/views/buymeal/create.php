<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'套餐管理'=>array('admin'),
	'添加购买信息',
);
?>

<?php
if($alertmessage){
	$this->widget('ext.toastMessage.toastMessageWidget',array(
		'message'=>$alertmessage[0],
		'type'=>'warning',
		'options'=>array(
			'position'=>'middle-center',
			'sticky'=>true
		 )
	));
}
echo $this->renderPartial('_form', array('model'=>$model)); 
 ?>