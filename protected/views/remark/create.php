<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'套餐管理'=>array('admin'),
	'添加开服套餐备注',
);
?>
<style>
	.list_{
		font-weight:bold;
	}
</style>
<?php
	 $action_ = array(
        'create',
		'giftcreate',
    );
	$active_ = array();
    foreach($action_ as $a_){
		if($a_==$this->action->id)
			$active_[] = 'list_';
		else $active_[] = '';
    }
?>

<a class="<?php echo $active_[0]?>" href="<?php echo Yii::app()->createUrl('remark/create');?>">开服套餐备注</a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a class="<?php echo $active_[1]?>" href="<?php echo Yii::app()->createUrl('remark/giftcreate');?>">礼包套餐备注</a>
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