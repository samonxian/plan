<?php
/* @var $this PinfoController */
/* @var $data Pinfo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typeo')); ?>:</b>
	<?php echo CHtml::encode($data->typeo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('system')); ?>:</b>
	<?php echo CHtml::encode($data->system); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relative')); ?>:</b>
	<?php echo CHtml::encode($data->relative); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cCompany')); ?>:</b>
	<?php echo CHtml::encode($data->cCompany); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rCompany')); ?>:</b>
	<?php echo CHtml::encode($data->rCompany); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('site')); ?>:</b>
	<?php echo CHtml::encode($data->site); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('downaddress')); ?>:</b>
	<?php echo CHtml::encode($data->downaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platform')); ?>:</b>
	<?php echo CHtml::encode($data->platform); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typet')); ?>:</b>
	<?php echo CHtml::encode($data->typet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('theme')); ?>:</b>
	<?php echo CHtml::encode($data->theme); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ul')); ?>:</b>
	<?php echo CHtml::encode($data->ul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fightform')); ?>:</b>
	<?php echo CHtml::encode($data->fightform); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gstate')); ?>:</b>
	<?php echo CHtml::encode($data->gstate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chargingMode')); ?>:</b>
	<?php echo CHtml::encode($data->chargingMode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	*/ ?>

</div>