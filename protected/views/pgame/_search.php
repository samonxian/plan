<?php
/* @var $this PgameController */
/* @var $model Pgame */
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
		<?php echo $form->label($model,'g_id'); ?>
		<?php echo $form->textField($model,'g_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_id'); ?>
		<?php echo $form->textField($model,'m_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_url'); ?>
		<?php echo $form->textField($model,'g_url',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->