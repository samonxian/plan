<?php
/* @var $this PgameController */
/* @var $data Pgame */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_id')); ?>:</b>
	<?php echo CHtml::encode($data->g_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m_id')); ?>:</b>
	<?php echo CHtml::encode($data->m_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('g_url')); ?>:</b>
	<?php echo CHtml::encode($data->g_url); ?>
	<br />


</div>