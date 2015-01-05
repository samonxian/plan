<?php
/* @var $this LinkmanController */
/* @var $data Linkman */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_name')); ?>:</b>
	<?php echo CHtml::encode($data->c_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post')); ?>:</b>
	<?php echo CHtml::encode($data->post); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_qq')); ?>:</b>
	<?php echo CHtml::encode($data->c_qq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_tel')); ?>:</b>
	<?php echo CHtml::encode($data->c_tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_show')); ?>:</b>
	<?php echo CHtml::encode($data->c_show); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_id')); ?>:</b>
	<?php echo CHtml::encode($data->p_id); ?>
	<br />


</div>