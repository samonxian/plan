<?php
/* @var $this MessageController */
/* @var $model BbiiMessage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php if($this->action->id == 'create'): ?>
		<?php echo $form->labelEx($model,'sendto'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'attribute'=>'search',
				'model'=>$model,
				'sourceUrl'=>array('member/members'),
				'theme'=>$this->module->juiTheme,
				'options'=>array(
					'minLength'=>2,
					'delay'=>200,
					'select'=>'js:function(event, ui) { 
						$("#BbiiMessage_search").val(ui.item.label);
						$("#BbiiMessage_sendto").val(ui.item.value);
						return false;
					}',
				),
				'htmlOptions'=>array(
					'style'=>'height:20px;',
				),
			)); 
		?>
	<?php else: ?>
		<?php echo $form->label($model,'sendto'); ?>
		<strong><?php echo CHtml::encode($model->search); ?></strong>
	<?php endif; ?>
		<?php echo $form->hiddenField($model,'sendto'); ?>
		<?php echo $form->error($model,'sendto'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>100,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>
	
	<div class="row">
		<?php $this->widget($this->module->id.'.extensions.editMe.widgets.ExtEditMe', array(
			'model'=>$model,
			'attribute'=>'content',
			'autoLanguage'=>false,
			'height'=>'300px',
			'toolbar'=>array(
				array(
					'Bold', 'Italic', 'Underline', 'RemoveFormat'
				),
				array(
						'TextColor', 'BGColor',
				),
				'-',
				array('Link', 'Unlink', 'Image'),
				'-',
				array('Blockquote'),
			),
			'skin'=>$this->module->editorSkin,
			'uiColor'=>$this->module->editorUIColor,
			'contentsCss'=>$this->module->editorContentsCss,
		)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo $form->hiddenField($model,'type'); ?>
		<?php echo CHtml::submitButton(Yii::t('BbiiModule.bbii', 'Send')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->