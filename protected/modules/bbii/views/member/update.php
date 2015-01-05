<?php
/* @var $this ForumController */
/* @var $model BbiiMember */

$this->bbii_breadcrumbs=array(
	Yii::t('BbiiModule.bbii', 'Forum')=>array('forum/index'),
	Yii::t('BbiiModule.bbii', 'Members')=>array('member/index'),
	$model->member_name . Yii::t('BbiiModule.bbii', '\'s profile')=>array('member/view','id'=>$model->id),
	Yii::t('BbiiModule.bbii', 'Update')
);

$item = array(
	array('label'=>Yii::t('BbiiModule.bbii', 'Forum'), 'url'=>array('forum/index')),
	array('label'=>Yii::t('BbiiModule.bbii', 'Members'), 'url'=>array('member/index')),
	array('label'=>Yii::t('BbiiModule.bbii', 'Approval'), 'url'=>array('moderator/approval'), 'visible'=>$this->isModerator()),
	array('label'=>Yii::t('BbiiModule.bbii', 'Posts'), 'url'=>array('moderator/admin'), 'visible'=>$this->isModerator()),
);

Yii::app()->clientScript->registerScript('presence', "
$('.presence-button').click(function(){
	$('.presence').toggle();
	return false;
});
$('.presence').hide();
", CClientScript::POS_READY);

?>
<div id="bbii-wrapper">
	<?php echo $this->renderPartial('_header', array('item'=>$item)); ?>
	
	<div class="bbii-box-top"><?php echo $model->member_name . Yii::t('BbiiModule.bbii', '\'s profile'); ?></div>

	<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'bbii-member-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	)); ?>

		<p class="note"><?php echo Yii::t('BbiiModule.bbii', 'Fields with <span class="required">*</span> are required.'); ?></p>

		<?php echo $form->errorSummary($model); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'member_name'); ?>
			<?php echo $form->textField($model,'member_name',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'member_name'); ?>
		</div>
		
		<?php if($this->isModerator()): ?>
		<div class="row">
			<?php echo $form->labelEx($model,'group_id'); ?>
			<?php echo $form->dropDownList($model, 'group_id', CHtml::listData(BbiiMembergroup::model()->findAll(), 'id', 'name')); ?>
			<?php echo $form->error($model,'group_id'); ?>
		</div>
		<?php endif; ?>
		
		<div class="row" style="clear:both;">
			<?php echo $form->labelEx($model,'gender'); ?>
			<?php echo $form->dropDownList($model,'gender',array(''=>'','0'=>Yii::t('BbiiModule.bbii', 'Male'),'1'=>Yii::t('BbiiModule.bbii', 'Female'))); ?>
			<?php echo $form->error($model,'gender'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'birthdate'); ?>
			<?php echo $form->hiddenField($model,'birthdate'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'birthdate',
				'value'=>Yii::app()->dateFormatter->formatDateTime($model->birthdate, 'short', null),
				'language'=>substr(Yii::app()->language, 0, 2),
				'theme'=>$this->module->juiTheme,
				'options'=>array(
					'altField'=>'#BbiiMember_birthdate',
					'altFormat'=>'yy-mm-dd',
					'showAnim'=>'fold',
				),
				'htmlOptions'=>array(
					'style'=>'height:20px;'
				),
			)); ?>
			<?php echo $form->error($model,'birthdate'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'location'); ?>
			<?php echo $form->textField($model,'location',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'location'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'personal_text'); ?>
			<?php echo $form->textField($model,'personal_text',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'personal_text'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'show_online'); ?>
			<?php echo $form->dropDownList($model,'show_online',array('0'=>Yii::t('BbiiModule.bbii', 'No'),'1'=>Yii::t('BbiiModule.bbii', 'Yes'))); ?>
			<?php echo $form->error($model,'show_online'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'contact_email'); ?>
			<?php echo $form->dropDownList($model,'contact_email',array('0'=>Yii::t('BbiiModule.bbii', 'No'),'1'=>Yii::t('BbiiModule.bbii', 'Yes'))); ?>
			<?php echo $form->error($model,'contact_email'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'contact_pm'); ?>
			<?php echo $form->dropDownList($model,'contact_pm',array('0'=>Yii::t('BbiiModule.bbii', 'No'),'1'=>Yii::t('BbiiModule.bbii', 'Yes'))); ?>
			<?php echo $form->error($model,'contact_pm'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'timezone'); ?>
			<?php echo $form->dropDownList($model, 'timezone', array_combine(DateTimeZone::listIdentifiers(), DateTimeZone::listIdentifiers())); ?>
			<?php echo $form->error($model,'timezone'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'avatar'); ?>
			<?php echo CHtml::image((isset($model->avatar))?(Yii::app()->request->baseUrl . $this->module->avatarStorage . '/'. $model->avatar):$this->module->getRegisteredImage('empty.jpeg'), 'avatar', array('align'=>'left','style'=>'margin:0 10px 10px 0;')); ?>
			<?php echo $form->labelEx($model,'remove_avatar'); ?>
			<?php echo $form->checkBox($model, 'remove_avatar'); ?>
			<?php echo $form->labelEx($model, 'image'); ?>
			<?php echo $form->fileField($model, 'image', array('size'=>90)); ?><br>
			<?php echo Yii::t('BbiiModule.bbii', 'Large images will be resized to fit a size of 90 pixels by 90 pixels.'); ?>
			<?php echo $form->error($model, 'image'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'signature'); ?>
			<?php $this->widget($this->module->id.'.extensions.editMe.widgets.ExtEditMe', array(
				'model'=>$model,
				'attribute'=>'signature',
				'autoLanguage'=>false,
				'height'=>'120px',
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
			<?php echo $form->error($model,'signature'); ?>
		</div>
		
		<?php echo CHtml::link(Yii::t('BbiiModule.bbii', 'My presence on the internet'),'#',array('class'=>'presence-button')); ?>

		<div class="row presence">
			<?php echo $form->labelEx($model,'website'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Globe.png'), 'Website', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'website',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'website'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'blogger'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Blogger.png'), 'Blogger', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'blogger',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'blogger'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'facebook'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Facebook.png'), 'Facebook', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'facebook',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'facebook'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'flickr'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Flickr.png'), 'Flickr', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'flickr',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'flickr'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'google'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Google.png'), 'Google', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'google',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'google'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'linkedin'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Linkedin.png'), 'Linkedin', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'linkedin',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'linkedin'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'metacafe'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Metacafe.png'), 'Metacafe', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'metacafe',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'metacafe'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'myspace'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Myspace.png'), 'Myspace', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'myspace',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'myspace'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'orkut'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Orkut.png'), 'Orkut', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'orkut',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'orkut'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'tumblr'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Tumblr.png'), 'Tumblr', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'tumblr',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'tumblr'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'twitter'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Twitter.png'), 'Twitter', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'twitter',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'twitter'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'wordpress'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Wordpress.png'), 'Wordpress', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'wordpress',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'wordpress'); ?>
		</div>

		<div class="row presence">
			<?php echo $form->labelEx($model,'youtube'); ?>
			<?php echo CHtml::image($this->module->getRegisteredImage('Youtube.png'), 'Youtube', array('style'=>'vertical-align:middle')); ?>
			<?php echo $form->textField($model,'youtube',array('size'=>100,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'youtube'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton(Yii::t('BbiiModule.bbii', 'Save')); ?>
		</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->
</div>