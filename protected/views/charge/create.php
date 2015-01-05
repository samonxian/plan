<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'充值管理'=>array('admin'),
	'添加充值信息',
);
?>

<?php
if($gameExist){
	$this->widget('ext.toastMessage.toastMessageWidget',array(
		'message'=>'该信息已经存在！',
		'type'=>'warning',
		'options'=>array(
			'position'=>'middle-center',
			'sticky'=>true
		 )
	));
}
echo $this->renderPartial('_form', array('model'=>$model)); 
 ?>