<?php
/* @var $this ModelController */
/* @var $title string */
/* @var $model object */
/* @var $form TbActiveForm */
 
$attributes = array();
foreach ($model->attributeAddLabels() as $attribute => $label) {
    if (isset($model->tableSchema->columns[$attribute]) && $model->tableSchema->columns[$attribute]->isPrimaryKey === true) {
        continue;
    }
    $attributes[] = $attribute;
}
$attributes = array_filter(array_unique(array_map('trim', $attributes)));
?>

<div class="row-fluid">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => get_class($model) . '-id-form',
            'inlineErrors' => false,
            'type'=>'horizontal',
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
                'class' => 'j_Validform',
            ),
        ));
        echo $form->errorSummary($model);
        
        
 // 厂商列表       
        echo '<div class="control-group">';
        if($form->type!='inline')
            echo $form->labelEx($model, 'm_id', array('class' => 'control-label'));
        echo '<div class="" style="margin-left:214px">';
        $criteria=new CDbCriteria(array(
            'condition'=>"`examine`=1",  
            'order'=>'`created` DESC', 
        )); 
        $dataProvider = new JSonActiveDataProvider('Company',array(
            'criteria'=>$criteria,
        ));
        $data = $dataProvider->getArrayData();
        $data2 = array('请选择厂商');
        foreach($data['data'] as $d){
            $data2[$d['id']] = $d['name'];
        }
        
        //echo get_class($model).'[m_id]';
        $this->widget('ext.chosen.Chosen', array(
            'name' => get_class($model).'[m_id]',
            'data' => $data2,
            'noResults' => '没结果对应',
        ));
        echo '</div></div>';
      ?>
        <div class="">
            <div class="control-group">
                <label for="pinfo_p_id" class="control-label required">选择平台</label>
                <span class="required">*</span>
                <div style="margin:-20px 0 0 214px;">
                     <select id="pinfo_p_id" name="Pinfo[p_id]">
                        <option>请选择平台</option>
                    </select>
                    <span class="Validform_checktip"></span>
                </div>
            </div>
        </div>
        
        
      <?php     
        foreach ($attributes as $attribute) {
            echo '<div class="">';
            $this->widget('ext.widgets.BootstrapBuildFormChild', array(
                'form' => $form,
                'model' => $model,
                'attribute' => $attribute,
            ));
            echo '</div>';
        }
        
        ?>
        <br/>
        <div class="mt5 ml15 pl15">
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
                    'label' =>  '删除',
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
<br/>
<?php    
    Yii::app()->clientscript->registerScript('posiiton','
         $("#Pinfo_m_id").change(function (){
            var text = $("#Pinfo_m_id_chzn").find("a").find("span").text();
            text = text.replace(/\s+/g,"");
            if(text != "请选择厂商"){
                $.post("'.Yii::app()->createUrl("pinfo/create").'",{name:text},function (json){

                   var content = "<option>请选择平台</option>";
                   for(i in json){
                       content +=  "<option value="+json[i]["id"]+">"+json[i]["p_name"]+"</option>";
                   }
                   $("#pinfo_p_id").html(content);
                },"json");
            }
         });
         return false;
    ');
?>