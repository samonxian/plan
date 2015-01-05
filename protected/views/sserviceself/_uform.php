<style>
    .row-fluid{min-height: 800px;}
	.addlink{padding-left:220px;}
	.hidefont{overflow: hidden;height: 0;}
	.nomi_font_tip{right:460px;top:-18px;font-size:14px;font-style:italic;color:red;}
	.red{color:red;}
</style>
<?php
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('validform',"
    seajs.use('$baseUrl/js/admin/validform.js');
",CClientScript::POS_END);

$games = $this->getGame();
$model->setChosen('g_id',$games);

$platforms = $this->getPlatform();
$model->setChosen('p_id',$platforms);


$introMoney = $this->getIntroMoney();

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
        
      ?>
        
      <?php     
		$validatorRules = $model->validatorRules();
        foreach ($attributes as $attribute) {
			if(!isset($validatorRules[$attribute])) 
				$validatorRules[$attribute] = "";
            echo '<div class="">';
            $this->widget('ext.widgets.BootstrapBuildFormChild', array(
                'form' => $form,
                'model' => $model,
                'attribute' => $attribute,
				'datatype' => $validatorRules[$attribute],
            ));
            echo '</div>';
        }
        
        ?>
        <br/>
		<div class="addlink"><a href="#">添加发号</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">关联发号</a></div>
		<div class="addlink"><a href="#">添加福利</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">关联福利</a></div>
		<div class="addlink"><a href="#">添加活动</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">关联活动</a></div>
		
        <div class="mt5 ml15 pl15">
            <?php
            $buttons = array(
                array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'label' => Yii::t('YcmModule.ycm', '保存'),
                    'htmlOptions' => array('name' => '_save')
                )
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
		isBuymeal : false,
		mealArray :　"",
		bM : 0,
		dnIntro : 0,
		dIntro : 0,
		shIntro : 0,
        init : function (){
			this.bM = <?php echo $this->getBalance(); ?>;
			this.dnIntro = <?php echo $introMoney[1];?>;
			this.dIntro = <?php echo $introMoney[0];?>;
			this.shIntro = <?php echo $introMoney[2];?>;
			var disablefields = ['money','g_id','p_id','open','service','serviceName','registerAddress'];
			for(field in disablefields){
				$("#Sservice_"+disablefields[field]).attr("readonly",true);
			}
			
			
			$("#<?php echo get_class($model).'_nominate';?>").after("<i class='red'>（全天推荐"+this.dIntro+"元 通宵推荐"+this.dnIntro+"元 单次推荐"+this.shIntro+"元）</i>");
			
           
		    $.post(<?php echo "'".Yii::app()->createUrl("sserviceself/getBuymeal")."'"; ?>,{},function (json){
				Action.isBuymeal = json["isBuymeal"];
				Action.mealArray = json["mealArray"];
				Action.nominate_font();
				Action.nominate();
		    },"json");
        },
        
		timeHandle : function (value){
			var Sservice_nomi_font_value = value;
            Sservice_nomi_font_value = Sservice_nomi_font_value.split(" ");
			Sservice_nomi_font_value = Sservice_nomi_font_value[1].split(":");
			Sservice_nomi_font_value = Sservice_nomi_font_value[0];
			return Sservice_nomi_font_value;
		},
        nominate : function (){
			// 推荐处理
			var Sservice_nomi_font_value = this.timeHandle($("#<?php echo get_class($model).'_open';?>").val());
			var nominate_val = 0;
		   if(Action.isBuymeal){
				nominate_val = 1;
		   }else{
				if(Action.bM > Action.shIntro){
					nominate_val = 1;
				}else{
					nominate_val = 0;
					Sservice_nomi_font_value = "";
				}
		   }
		   
			$("#<?php echo get_class($model).'_nominate';?>").val(nominate_val);
            this.nominateEff($("#<?php echo get_class($model).'_nominate';?>").val());
			if(Sservice_nomi_font_value != "")
			$("#Sservice_nomi_font").val(Sservice_nomi_font_value).trigger("change");
			
			$("#<?php echo get_class($model).'_nominate';?>").change(function (){
              var value = $(this).val();
              Action.nominateEff(value);
            });
        },
        nominateEff : function (value){
             if(value == 1) {
				$("#Sservice_nomi_font").parents(".control-group").parent().removeClass("hidefont");
			 }else{
				$("#Sservice_nomi_font").parents(".control-group").parent().addClass("hidefont");
			 }
        },
		nominate_font : function (){
			var balancemoney = this.bM;
			var factMoney = <?php echo $introMoney[2];?>;
			$("#<?php echo get_class($model).'_money';?>").val(0);
			$("#<?php echo get_class($model).'_nomi_font';?>").change(function (){
				var values = $(this).val();
				if(values == null) {
					$("#<?php echo get_class($model).'_money';?>").val(0);
					return;
				}
				var moneys = 0;
				var mealvalue = "";
				var tmpmoney = 0;
				var jcount = 0;
				var wastenumber = 0;
				
				for(var iii in values){
					if(("全天" != values[iii])&&("通宵" != values[iii])){
						jcount ++;
					}
				}
				for(var i=0;i< values.length;i++){
					if("全天" == values[i]){
						moneys += <?php echo $introMoney[0];?>;
					}else if("通宵" == values[i]){
						moneys += <?php echo $introMoney[1];?>;
					}else{
						if(Action.isBuymeal){
							mealvalue = "";
							if(Action.objlength(Action.mealArray) == 1){
								for(m in Action.mealArray){
									if(Action.mealArray[m] < jcount){
										mealvalue += m+":0";
										tmpmoney = (jcount - Action.mealArray[m])*factMoney;
										wastenumber = Action.mealArray[m];
									}else{						
										mealvalue += m+":"+(Action.mealArray[m]-jcount);
										wastenumber = jcount;
										break;
									}
								}
							}else{
								tmpnumber = jcount;
								for(m in Action.mealArray){
									if(Action.mealArray[m] < tmpnumber){
										tmpnumber = tmpnumber - Action.mealArray[m];
										mealvalue += m+":0/";
									}else{
										mealvalue += m+":"+(Action.mealArray[m] - tmpnumber);
										break;
									}
								}
								wastenumber = jcount;
							}
						}else{
							if((balancemoney - jcount*factMoney) < 0){
								alert("余额不足！");
								$(this).val("");
								return;
							}else{
								moneys += <?php echo $introMoney[2];?>;
							}
						}
					}
				}
				moneys += tmpmoney;
				
				if((balancemoney - moneys)<0){
					alert("余额不足!");
					moneys = 0;
					mealvalue = "";
					return;
				}
				
				var tmpbnumber = 0;
				var totalnumber = 0;
				
				if(Action.isBuymeal){
					for(ik in Action.mealArray){
						totalnumber += parseInt(Action.mealArray[ik]);
					}
				}
				tmpbnumber = totalnumber - wastenumber;
				Action.nominate_result(moneys,wastenumber,tmpbnumber,mealvalue);	
			});
		},
		nominate_result : function (moneys,wastenumber,tmpbnumber,mealvalue){
			$("#<?php echo get_class($model).'_money';?>").val("消费金额"+moneys+"元，消费套餐"+wastenumber+"条，剩余套餐"+tmpbnumber+"条");
			$("#<?php echo get_class($model).'_money2';?>").val(moneys);
			$("#<?php echo get_class($model).'_nominatehandle';?>").val(mealvalue);
		},
		objlength : function (obj){
			n = 0;
			for(var ii in obj){
				n ++;
			}
			return n;
		} 
    }
    $(function (){
		// -----
        $("#Sservice_nomi_font").parents(".control-group").parent().addClass("hidefont");
        Action.init();
		//----
		var nomi_font_tip = "<div class='nomi_font_tip absolute'>"+
		"*请选择推荐时间，如果开服选择了推荐，推荐时间没有选择则默认推荐时间为开服时间</div>";
		$(".nomi_font").addClass("relative").append(nomi_font_tip);
    });
    
</script>
