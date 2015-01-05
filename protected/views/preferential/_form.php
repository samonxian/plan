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
                array(
                    'buttonType' => 'submit',
                    'label' => Yii::t('YcmModule.ycm', '保存并添加另一个'),
                    'htmlOptions' => array('name' => '_addanother')
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
	 ActionCount = {
		init : function (){
			$("#<?php echo get_class($model).'_permoney';?>").attr("readonly",true);
			$("#<?php echo get_class($model).'_savemoney';?>").attr("readonly",true);
			this.mealHandle();
		},
		moneyCount : function (mealnumberValue,moneyValue){
			var perOmoney = <?php echo $this->getOpermoney(); ?>;
			var permoney = powAmount(moneyValue/mealnumberValue,2);
			var saveMoney = perOmoney*mealnumberValue - moneyValue;
			$("#<?php echo get_class($model).'_permoney';?>").val(permoney);
			$("#<?php echo get_class($model).'_savemoney';?>").val(saveMoney);
		},
		mealHandle : function (){
			$("#<?php echo get_class($model).'_mealnumber';?>").keyup(function (){
				var mealnumberValue = $(this).val();
				var moneyValue = $("#<?php echo get_class($model).'_money';?>").val();
				if((mealnumberValue != "")&&(moneyValue != "")) ActionCount.moneyCount(mealnumberValue,moneyValue);
			});
			$("#<?php echo get_class($model).'_money';?>").keyup(function (){
				var moneyValue = $(this).val();
				var mealnumberValue = $("#<?php echo get_class($model).'_mealnumber';?>").val();
				if((mealnumberValue != "")&&(moneyValue != "")) ActionCount.moneyCount(mealnumberValue,moneyValue);
			});
		}
	 }
	ActionCount.init();
	function powAmount(amount,_pow_) { 
		 var amount_bak=amount;  
		 var base=10;  
		 if(isNaN(amount)){  
			alert(amount+'必须为数字');  
			return;  
		 }
		 if(isNaN(_pow_)){  
			alert(_pow_+'必须为数字');  
			return;  
		 }  
	   amount = Math.round( ( amount - Math.floor(amount) ) *Math.pow(base,_pow_));  
	   amount=amount<10 ? '.0' + amount : '.' + amount  
	   amount=Math.floor(amount_bak)+amount;  
	   return amount;
	}
</script>