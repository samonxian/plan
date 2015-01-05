<?php
/* @var $this PlatformController */
/* @var $model Platform */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_name'); ?>
		<?php echo $form->textField($model,'p_name',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_short'); ?>
		<?php echo $form->textField($model,'p_short',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_address'); ?>
		<?php echo $form->textField($model,'p_address',array('size'=>60,'maxlength'=>110)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_r_address'); ?>
		<?php echo $form->textField($model,'p_r_address',array('size'=>60,'maxlength'=>110)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_examine'); ?>
		<?php echo $form->textField($model,'p_examine'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_logo_thumb'); ?>
		<?php echo $form->textField($model,'p_logo_thumb',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_id'); ?>
		<?php echo $form->textField($model,'m_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->