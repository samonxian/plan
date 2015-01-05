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
		mealnumberArray : [],
		init : function (){
			 var m_id = <?php echo "'".$model->m_id."'";?> ;
			 $("#<?php echo get_class($model).'_m_id';?>").find("option[value='"+m_id+"']").attr("selected",true);
			
			 $("#<?php echo get_class($model).'_m_id';?>").change(function (){
				var value = $(this).val();
				var company = $(this).find("option:selected").text();
				$("#<?php echo get_class($model).'_company';?>").val(company);
				
			 });
			 
			 this.getmeal(0);
			 $("#<?php echo get_class($model).'_type';?>").change(function (){
				var value = $(this).val();
				if(value == "") return;
				else Action.getmeal(value);
			 });
			 $("#<?php echo get_class($model).'_meal_id';?>").change(function (){
				var value = $(this).val();
				if(value == "") return;
				$("#<?php echo get_class($model).'_balancenumber';?>").val(Action.mealnumberArray[value]);
			 });
		},
		getmeal : function (type){
			$.post(<?php echo "'".Yii::app()->createUrl("buymeal/getmeal")."'"; ?>,{"type":type},function (json){
				Action.mealnumberArray = json['mealnumbers'];
				var meal = json['meal'];
				mealoptions = "<option>请选择套餐</option>";
				if(meal != ""){
					for(i in meal){
						if(<?php echo "'".$model->meal_id."'";?> == i){
							mealoptions += "<option value='"+i+"' selected='selected'>"+meal[i]+"</option>";
						}else{
							mealoptions += "<option value='"+i+"'>"+meal[i]+"</option>";
						}
					}
				}
				$("#<?php echo get_class($model).'_meal_id';?>").html(mealoptions);
			},"json");
		}
		
	}
	Action.init();

</script>