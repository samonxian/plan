<style>
    .row-fluid{min-height: 700px;}
</style>
<?php
/* @var $this ModelController */
/* @var $title string */
/* @var $model object */
/* @var $form TbActiveForm */
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('validform',"
    seajs.use('$baseUrl/js/admin/validform.js');
",CClientScript::POS_END); 


$model->setChosen('m_id',$this->getCompany());
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
                // array(
                    // 'buttonType' => 'submit',
                    // 'label' => Yii::t('YcmModule.ycm', '保存并添加另一个'),
                    // 'htmlOptions' => array('name' => '_addanother')
                // ),
//                array(
//                    'buttonType' => 'submit',
//                    'label' => Yii::t('YcmModule.ycm', '保存并继续修改'),
//                    'htmlOptions' => array('name' => '_continue')
//                ),
            );
            /**
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
                        'confirm' => Yii::t('YcmModule.ycm', '你确定要删除这条？'),
                    )
                ));
            }
            **/
            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                'type' => '',
                'buttons' => $buttons,
            ));
            ?>
        </div>
        <?php $this->endWidget(); ?>
</div>
<br/>

<script>
	Action = {
		init : function (){
			 var m_id = <?php echo "'".$model->m_id."'";?> ;
			 $("#<?php echo get_class($model).'_m_id';?>").find("option[value='"+m_id+"']").attr("selected",true);

			 this.getplatform($("#<?php echo get_class($model).'_m_id';?>").val());
			 $("#<?php echo get_class($model).'_m_id';?>").change(function (){
				var value = $(this).val();
				Action.getplatform(value);
			 });
		},
		getplatform : function (m_id){
			$.post(<?php echo "'".Yii::app()->createUrl("buymeal/getPlatform")."'"; ?>,{"m_id":m_id},function (json){
				var platforms = json['platforms'];
				platformoptions = "<option>请选择平台</option>";
				if(platforms != ""){
					for(i in platforms){
						if(<?php echo "'".$model->p_id."'";?> == i){
							platformoptions += "<option value='"+i+"' selected='selected'>"+platforms[i]+"</option>";
						}else{
							platformoptions += "<option value='"+i+"'>"+platforms[i]+"</option>";
						}
					}
				}
				$("#<?php echo get_class($model).'_p_id';?>").html(platformoptions);
				$("#<?php echo get_class($model).'_p_id';?>").change(function (){
				   var p_name = $(this).find("option:selected").text();
                   $("#<?php echo get_class($model).'_platform';?>").val(p_name);  
				});
			},"json");
		}
	}
	Action.init();

</script>