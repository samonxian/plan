<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('restaurant')); ?>:</b>
	<?php echo CHtml::encode($data->restaurant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slogan')); ?>:</b>
	<?php echo CHtml::encode($data->slogan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meal_time')); ?>:</b>
	<?php echo CHtml::encode($data->meal_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('support')); ?>:</b>
	<?php echo CHtml::encode($data->support); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brief')); ?>:</b>
	<?php echo CHtml::encode($data->brief); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('contact')); ?>:</b>
	<?php echo CHtml::encode($data->contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ps')); ?>:</b>
	<?php echo CHtml::encode($data->ps); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_7')); ?>:</b>
	<?php echo CHtml::encode($data->menu_7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_8')); ?>:</b>
	<?php echo CHtml::encode($data->menu_8); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_9')); ?>:</b>
	<?php echo CHtml::encode($data->menu_9); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_o')); ?>:</b>
	<?php echo CHtml::encode($data->menu_o); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_scws')); ?>:</b>
	<?php echo CHtml::encode($data->menu_scws); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('snack')); ?>:</b>
	<?php echo CHtml::encode($data->snack); ?>
	<br />

	*/ ?>

</div>