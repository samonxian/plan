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
            );

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
			 var m_id = <?php echo "'".$model->m_id."'";?>;
			 $("#<?php echo get_class($model).'_m_id';?>").find("option[value='"+m_id+"']").attr("selected",true);
			 // if(m_id != "") this.getplatform(m_id);
			 $("#<?php echo get_class($model).'_m_id';?>").change(function (){
				var value = $(this).val();
				var name = $(this).find("option:selected").text();
				$("#<?php echo get_class($model).'_company';?>").val(name);
				//Action.getplatform(value);
			 });
		},
		getplatform : function (m_id){
			$.post(<?php echo "'".Yii::app()->createUrl("buymeal/getPlatform")."'"; ?>,{"m_id":m_id},function (json){
				var selectedPlatforms = <?php echo "'".$model->p_id."'";?>;
				var platformArray = [];
				if(selectedPlatforms != ""){
					platformArray = selectedPlatforms.split(",");
				}
				
				var platforms = json['platforms'];
				platformoptions = "<option>请选择平台</option>";
				if(platforms != ""){
					for(i in platforms){
						if(in_array(i,platformArray)){
							platformoptions += "<option value='"+i+"' selected='selected'>"+platforms[i]+"</option>";
						}else{
							platformoptions += "<option value='"+i+"'>"+platforms[i]+"</option>";
						}
					}
				}
				$("#<?php echo get_class($model).'_p_id';?>").html(platformoptions);
			},"json");
		}
	}
	Action.init();
	function in_array(value,array){
		if(array.toString().indexOf(value) > -1)
			return true;
		else 
			return false;
	}
</script>