<?php
/* @var $this PgameController */
/* @var $model Pgame */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pgame-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'g_id'); ?>
		<?php echo $form->textField($model,'g_id'); ?>
		<?php echo $form->error($model,'g_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m_id'); ?>
		<?php echo $form->textField($model,'m_id'); ?>
		<?php echo $form->error($model,'m_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'g_url'); ?>
		<?php echo $form->textField($model,'g_url',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'g_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->