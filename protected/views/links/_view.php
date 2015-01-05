<?php
/* @var $this CompanyController */
/* @var $data Company */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user')); ?>:</b>
	<?php echo CHtml::encode($data->user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('initial')); ?>:</b>
	<?php echo CHtml::encode($data->initial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_pin')); ?>:</b>
	<?php echo CHtml::encode($data->name_pin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('examine')); ?>:</b>
	<?php echo CHtml::encode($data->examine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mid')); ?>:</b>
	<?php echo CHtml::encode($data->mid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pwd')); ?>:</b>
	<?php echo CHtml::encode($data->pwd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('short')); ?>:</b>
	<?php echo CHtml::encode($data->short); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('belong')); ?>:</b>
	<?php echo CHtml::encode($data->belong); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel')); ?>:</b>
	<?php echo CHtml::encode($data->tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_code')); ?>:</b>
	<?php echo CHtml::encode($data->zip_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mail')); ?>:</b>
	<?php echo CHtml::encode($data->mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_num')); ?>:</b>
	<?php echo CHtml::encode($data->article_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_d_thumb')); ?>:</b>
	<?php echo CHtml::encode($data->article_d_thumb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('icp')); ?>:</b>
	<?php echo CHtml::encode($data->icp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('icp_d_thumb')); ?>:</b>
	<?php echo CHtml::encode($data->icp_d_thumb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('f_time')); ?>:</b>
	<?php echo CHtml::encode($data->f_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ismarket')); ?>:</b>
	<?php echo CHtml::encode($data->ismarket); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('net_vote')); ?>:</b>
	<?php echo CHtml::encode($data->net_vote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business')); ?>:</b>
	<?php echo CHtml::encode($data->business); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('about_src')); ?>:</b>
	<?php echo CHtml::encode($data->about_src); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo_thumb')); ?>:</b>
	<?php echo CHtml::encode($data->logo_thumb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	*/ ?>

</div>