<?php
/* @var $this ModelController */
/* @var $title string */
/* @var $model object */
/* @var $form TbActiveForm */
$attributes = array();
foreach ($model->attributeLabels() as $attribute => $label) {
    if (isset($model->tableSchema->columns[$attribute]) && $model->tableSchema->columns[$attribute]->isPrimaryKey === true) {
        continue;
    }
    $attributes[] = $attribute;
}
$attributes = array_filter(array_unique(array_map('trim', $attributes)));
?>

<div class="row-fluid">
    <div class="container">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => get_class($model) . '-id-form',
            'inlineErrors' => false,
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
                'class' => 'j_Validform',
            ),
        ));
        echo $form->errorSummary($model);
        foreach ($attributes as $attribute) {
            echo '<div class="mt15">';
            $this->widget('ext.widgets.BootstrapBuildFormChild', array(
                'form' => $form,
                'model' => $model,
                'attribute' => $attribute,
            ));
            echo '</div>';
        }
        ?>
        <br/>
        <div class="mt5">
            <?php
            $buttons = array(
                array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'label' => Yii::t('YcmModule.ycm', '保存'),
                    'htmlOptions' => array('name' => '_save')
                ),
                array(
                    'buttonType' => 'submit',
                    'label' => Yii::t('YcmModule.ycm', '保存并添加另一个'),
                    'htmlOptions' => array('name' => '_addanother')
                ),
                array(
                    'buttonType' => 'submit',
                    'label' => Yii::t('YcmModule.ycm', '保存并继续修改'),
                    'htmlOptions' => array('name' => '_continue')
                ),
            );
            if (!$model->isNewRecord) {
                array_push($buttons, array(
                    'buttonType' => 'link',
                    'type' => 'danger',
                    'url' => '#',
                    'label' => Yii::t('YcmModule.ycm', 'Delete'),
                    'htmlOptions' => array(
                         'submit' => array(
                            'delete',
                            'id' => $model->primaryKey,
                        ),
                        'confirm' => Yii::t('YcmModule.ycm', 'Are you sure you want to delete this item?'),
                    )
                ));
            }
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                'type' => '',
                'buttons' => $buttons,
            ));
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
