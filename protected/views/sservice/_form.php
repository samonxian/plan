<?php
/* @var $this ModelController */
/* @var $title string */
/* @var $model object */
/* @var $form TbActiveForm */
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('validform',"
    seajs.use('$baseUrl/js/admin/validform.js');
",CClientScript::POS_END); 

 // 游戏列表
$games = $this->getGame();
$model->setChosen('g_id',$games);

 // 公司列表
$companys = $this->getCompany();
$model->setChosen('m_id',$companys);

$attributes = array();
foreach ($model->attributeAddLabels() as $attribute => $label){
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

      ?>
        
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
                        'confirm' => Yii::t('YcmModule.ycm', '你确定要删除这条？'),
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

<script>
    Action = {
        init : function (){
			$("#<?php echo get_class($model).'_g_id';?>").change(function (){
				Action.selectGame(this);
			});
			$("#<?php echo get_class($model).'_m_id';?>").change(function (){
				Action.selectCompany(this);
			});
			this.nominate();
        },
        selectGame : function (e){
            var g_id = $(e).val();
            var g_name = $(e).find("option:selected").text();
            $("#<?php echo get_class($model).'_name';?>").val(g_name);
            $.post(<?php echo "'".Yii::app()->createUrl("sservice/getGameMess")."'"; ?>,{g_id:g_id},function (json){
                  $("#<?php echo get_class($model).'_type';?>").val(json["gametype"]);
            },"json");
        },
		selectCompany : function (e){
			var m_id = $(e).val();
            var m_name = $(e).find("option:selected").text();
            $("#<?php echo get_class($model).'_company';?>").val(m_name);
			$.post(<?php echo "'".Yii::app()->createUrl("sservice/getPlatforms")."'"; ?>,{m_id:m_id},function (json){
				var platform =  json['platforms'];
				var platformContent = "";
				for(var i in platform){
					platformContent += "<option value='"+i+"'>"+platform[i]+"</option>";
				}
                $("#<?php echo get_class($model).'_p_id';?>").html(platformContent);
            },"json");
		},
        nominate : function (){
            this.nominateEff($("#<?php echo get_class($model).'_nominate';?>").val());
            $("#<?php echo get_class($model).'_nominate';?>").change(function (){
               var value = $(this).val();
               Action.nominateEff(value);
            });
        },
        nominateEff : function (value){
             if(value == 1) 
                    $("#Sservice_nomi_font").parents(".control-group").parent().removeClass("hidefont");
                else
                   $("#Sservice_nomi_font").parents(".control-group").parent().addClass("hidefont");
        }
    }
	
    $(function (){
        $("#Sservice_nomi_font").parents(".control-group").parent().addClass("hidefont");
        Action.init();
    });
    
</script>
<style>
    .hidefont{overflow: hidden;height: 0;}
</style>
