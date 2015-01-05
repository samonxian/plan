<?php
/* @var $this SettingController */
/* @var $model BbiiForum */
/* @var $category[] BbiiForum  */

$this->bbii_breadcrumbs=array(
	Yii::t('BbiiModule.bbii', 'Forum')=>array('forum/index'),
	Yii::t('BbiiModule.bbii', 'Settings')=>array('setting/index'),
	Yii::t('BbiiModule.bbii', 'Forum layout'),
);

$item = array(
	array('label'=>Yii::t('BbiiModule.bbii', 'Settings'), 'url'=>array('setting/index')),
	array('label'=>Yii::t('BbiiModule.bbii', 'Forum layout'), 'url'=>array('setting/layout')),
	array('label'=>Yii::t('BbiiModule.bbii', 'Member groups'), 'url'=>array('setting/group')),
	array('label'=>Yii::t('BbiiModule.bbii', 'Moderators'), 'url'=>array('setting/moderator'))
);

Yii::app()->clientScript->registerScript('confirmation', "
var confirmation = new Array();
confirmation[0] = '" . Yii::t('BbiiModule.bbii', 'Are you sure that you want to delete this category?') . "';
confirmation[1] = '" . Yii::t('BbiiModule.bbii', 'Are you sure that you want to delete this forum?') . "';
", CClientScript::POS_BEGIN);
?>
<div id="bbii-wrapper">
	<?php echo $this->renderPartial('_header', array('item'=>$item)); ?>
	
	<div class="bbii-box-top"><?php echo Yii::t('BbiiModule.bbii', 'Add category or forum'); ?></div>
	
	<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'bbii-forum-form',
		'enableAjaxValidation'=>false,
	)); ?>

		<p class="note"><?php echo Yii::t('BbiiModule.bbii', 'Fields with <span class="required">*</span> are required.'); ?></p>
		
		<?php echo $form->errorSummary($model); ?>
		
		<div class="row">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('size'=>100,'maxlength'=>255, 'id'=>'name')); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'subtitle'); ?>
			<?php echo $form->textField($model,'subtitle',array('size'=>100,'maxlength'=>255, 'id'=>'subtitle')); ?>
			<?php echo $form->error($model,'subtitle'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'type'); ?>
			<?php echo $form->dropDownList($model,'type',array('0'=>Yii::t('BbiiModule.bbii', 'Category'),'1'=>Yii::t('BbiiModule.bbii', 'Forum')), array('id'=>'type')); ?>
			<?php echo $form->error($model,'type'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'cat_id'); ?>
			<?php echo $form->dropDownList($model,'cat_id',CHtml::listData(BbiiForum::model()->categories()->findAll(), 'id', 'name'), array('empty'=>'', 'id'=>'cat_id')); ?>
			<?php echo $form->error($model,'cat_id'); ?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton(Yii::t('BbiiModule.bbii', 'Add')); ?>
		</div>
		
	<?php $this->endWidget(); ?>
	
	</div><!-- form -->	
	
	
	<div class="bbii-box-top"><?php echo Yii::t('BbiiModule.bbii', 'Forum layout'); ?></div>
	<div class="sortable">
	<?php
		$items = array();
		foreach($category as $data) {
			$forum = BbiiForum::model()->sorted()->forum()->findAll("cat_id = $data->id");
			$items['cat_'.$data->id] = $this->renderPartial('_category', array('data'=>$data, 'forum'=>$forum), true);
		}
		$this->widget('zii.widgets.jui.CJuiSortable', array(
			'id' => 'sortcategory',
			'items' => $items,
			'htmlOptions'=>array('style'=>'list-style:none;;margin-top:1px'),
			'theme'=>$this->module->juiTheme,
			'options'=>array(
				'delay'=>'100',
				'update'=>'js:function(){Sort(this,"' . $this->createAbsoluteUrl('setting/ajaxSort') . '");}',
			),
		));
	?>
	</div>
</div>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'dlgEditForum',
	'theme'=>$this->module->juiTheme,
    'options'=>array(
        'title'=>'Edit',
        'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'show'=>'fade',
		'buttons'=>array(
			'Delete'=>'js:function(){ deleteForum("' . $this->createAbsoluteUrl('setting/deleteForum') .'"); }',
			'Save'=>'js:function(){ saveForum("' . $this->createAbsoluteUrl('setting/saveForum') .'"); }',
			'Cancel'=>'js:function(){ $(this).dialog("close"); }',
		),
    ),
));

    echo $this->renderPartial('_editForum', array('model'=>$model));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>