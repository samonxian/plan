<style>
    .row-fluid{min-height: 800px;}
	.addlink{padding-left:220px;}
	.hidefont{overflow: hidden;height: 0;}
	.nomi_font{margin-top:40px;}
	.nomi_font_tip{right:400px;top:-23px;font-size:16px;font-style:italic;color:red;}
	.intro{font-size:16px;}
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
<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>false, 'fade'=>true), // success, info, warning, error or danger
        ),
    ));
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
    $(function(){
        chosenSingleAjax.success = function(json){
            if(json.g_id){
                $("#Sservice_p_id").find("option[value='"+json.p_id+"']").attr("selected",true);
                var num = parseInt(json.service)+1;
                $("#Sservice_service").val(num);
                $("#Sservice_serviceName").val(json.serviceName);
                $("#Sservice_open").val(json.open);
                $("#Sservice_registerAddress").val(json.registerAddress);
                Action.nominateEff(json.nominate);
                $("#Sservice_nominate").find("option[value='"+json.nominate+"']").attr("selected",true);
            }
        }
    });
    function in_array(string,arr){
        var i = 0;
        for(i in arr){
            if(arr[i]==string) return true;
        }
        return false;
    }
    
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
			
			$("#<?php echo get_class($model).'_nominate';?>").after("<i class='red intro'>（全天推荐"+this.dIntro+"元 通宵推荐"+this.dnIntro+"元 单次推荐"+this.shIntro+"元）</i>");
			$("#<?php echo get_class($model).'_money';?>").attr("readonly",true);
           
		    $.post(<?php echo "'".Yii::app()->createUrl("sserviceself/getBuymeal")."'"; ?>,{},function (json){
				Action.isBuymeal = json["isBuymeal"];
				Action.mealArray = json["mealArray"];
//				Action.nominate_font();
				Action.nominate();
		    },"json");
			jQuery('#Sservice_open').datetimepicker({'onClose':function (data,obj){
				var value = Action.timeHandle(data);
				$("#Sservice_nomi_font").val(value).trigger("change");
			},'showAnim':'fold','dateFormat':'yy-mm-dd','timeFormat':'hh:mm','showSecond':false,'stepMinute':'60','hour':'10','minute':'49','second':'44'});

		   
		   
			$("#<?php echo get_class($model).'_g_id';?>").change(function (){
				Action.selectGame(this);
			});

			 // 平台处理
            $("#<?php echo get_class($model).'_p_id';?>").change(function (){
				var p_id = $(this).val();
                if(p_id != "") {
                   var p_name = $(this).find("option:selected").text();
                   $("#<?php echo get_class($model).'_platform';?>").val(p_name);  
                }
            });
			
        },
        selectGame : function (e){
            var g_id = $(e).val();
            var g_name = $("#<?php echo get_class($model).'_g_id';?>").find("option:selected").text();
            $("#<?php echo get_class($model).'_name';?>").val(g_name);
        },
		timeHandle : function (value){
			var Sservice_nomi_font_value = value;
//                        alert(value);
            Sservice_nomi_font_value = Sservice_nomi_font_value.split(" ");
			Sservice_nomi_font_value = Sservice_nomi_font_value[1].split(":");
			Sservice_nomi_font_value = Sservice_nomi_font_value[0];
                        Sservice_nomi_font_value = '';//修改默认推荐时间
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
                        if($("#<?php echo get_class($model).'_nominate';?>").val()==1){
                             this.nominateEff("2");
                        }
                       
			if(Sservice_nomi_font_value != "")
			$("#Sservice_nomi_font").val(Sservice_nomi_font_value).trigger("change");
			
			$("#<?php echo get_class($model).'_nominate';?>").change(function (){
                              var value = $(this).val();
                              Action.nominateEff(value);
                        });
        },
        nominateEff : function (value){
             switch(value){
                 case "0":
                     $("#Sservice_nomi_font").parents(".control-group").parent().addClass("hidefont");
                     $("#<?php echo get_class($model).'_money';?>").val("本次修改暂无消费，取消推荐系统会退还相应消费金额，请留意！");
                 break;
                 case "1":
                    $("#Sservice_nomi_font").parents(".control-group").parent().removeClass("hidefont");
                    
                 break;
                 case "2":
                    $("#Sservice_nomi_font").parents(".control-group").parent().removeClass("hidefont");
                    $("#Sservice_nomi_font").trigger("change");
                 break;
             }
        },
       
		nominate_font : function (type){
                        var nomi_font = <?php
                            $nomi_font = json_encode(explode('-', $model->nomi_font));
                            echo $nomi_font;
                        ?>;  
			var balancemoney = this.bM;
			var all_day_m = <?php echo $introMoney[0];?>;
			var night_m = <?php echo $introMoney[1];?>;
			var factMoney = <?php echo $introMoney[2];?>;
			$("#<?php echo get_class($model).'_money';?>").val(0);
			$("#<?php echo get_class($model).'_nomi_font';?>").change(function (){
				var values = $(this).val();
                                var moneys = 0;
                                var mealvalue = "";
                                var tmpmoney = 0;
                                var jcount = 0;
                                var wastenumber = 0;
                                
				if(values != undefined) {
                                   
                                    for(var iii in values){
                                            if(("全天" != values[iii])&&("通宵" != values[iii])){
                                                if(!in_array(values[iii],nomi_font))
                                                    jcount ++;
                                            }
                                    }
                                    for(var i=0;i< values.length;i++){
                                            if("全天" == values[i]&&!in_array('全天', nomi_font)){
                                                    moneys += all_day_m;
                                            }else if("通宵" == values[i]&&!in_array('通宵', nomi_font)){
                                                    moneys += night_m;
                                            }else{
                                                    if(!in_array(values[i],nomi_font))
                                                        if(Action.isBuymeal){
                                                                var len = Action.objlength(Action.mealArray);
                                                                mealvalue = "";
                                                                if(len == 1){
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
                                }
                                var k = 0;
                                if(nomi_font!='')
                                    for(k in nomi_font){
                                        if(values!=undefined){
                                            if(!in_array(nomi_font[k],values)&&nomi_font[k]=='通宵') moneys -= night_m;
                                            if(!in_array(nomi_font[k],values)&&nomi_font[k]=='全天') moneys -= all_day_m;
                                            if(!in_array(nomi_font[k],values)) {
                                                if(Action.isBuymeal){
                                                    var meal_values = mealvalue.split(':');
                                                    mealvalue = meal_values[0] + ":" + (parseInt(meal_values[1])+1);
                                                    wastenumber--;
                                                }else{
                                                    moneys -= factMoney
                                                }
                                                
                                            }
                                        }else{
                                            if(nomi_font[k]=='通宵') moneys -= night_m;
                                            if(nomi_font[k]=='全天') moneys -= all_day_m;

                                            for(m in Action.mealArray){
                                                var num = parseInt(Action.mealArray[m])+parseInt(k)+1;
                                                mealvalue = m+":"+ num;
                                                break;
                                            }
                                            wastenumber--;
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
		}(),
		nominate_result : function (moneys,wastenumber,tmpbnumber,mealvalue){
                        var msg = "消费金额"+moneys+"元，消费套餐"+wastenumber+"条，剩余套餐"+tmpbnumber+"条";
                        if(moneys<0) msg = "返还金额"+Math.abs(moneys)+"元，消费套餐"+wastenumber+"条，剩余套餐"+tmpbnumber+"条";
                        if(wastenumber<0) msg = "消费金额"+Math.abs(moneys)+"元，返还套餐"+Math.abs(wastenumber) +"条，剩余套餐"+tmpbnumber+"条";
                        if(wastenumber<0&&moneys<0) msg = "返还金额"+Math.abs(moneys)+"元，返还套餐"+Math.abs(wastenumber)+"条，剩余套餐"+tmpbnumber+"条";
			$("#<?php echo get_class($model).'_money';?>").val(msg);
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
    $(function(){
        var is_another = '<?php  
            if(isset( Yii::app()->session['temp_game_id'])){
                echo Yii::app()->session['temp_game_id'];
                unset(Yii::app()->session['temp_game_id']);
            }
            else echo "";
        ?>';
        if(is_another!=''){
            $("#Sservice_g_id").find("option[value='"+is_another+"']").attr("selected",true);
            chosenSingleAjax .get();
        }
    });
    
</script>
