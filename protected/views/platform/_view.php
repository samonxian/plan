<?php
/* @var $this PlatformController */
/* @var $data Platform */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_name')); ?>:</b>
	<?php echo CHtml::encode($data->p_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_short')); ?>:</b>
	<?php echo CHtml::encode($data->p_short); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_address')); ?>:</b>
	<?php echo CHtml::encode($data->p_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_r_address')); ?>:</b>
	<?php echo CHtml::encode($data->p_r_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_examine')); ?>:</b>
	<?php echo CHtml::encode($data->p_examine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_logo_thumb')); ?>:</b>
	<?php echo CHtml::encode($data->p_logo_thumb); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('m_id')); ?>:</b>
	<?php echo CHtml::encode($data->m_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	*/ ?>

</div>