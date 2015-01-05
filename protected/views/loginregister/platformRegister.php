
<style type="text/css" charset="utf-8">
    .form-checkbox{
            text-align:left;
            margin:10px 0 0 0;
    }
    .form-checkbox .form-checkbox-con{
            width:10px;
            height:10px;
            left:82px;
            top:3px;
    }
    .form-checkbox-title{
            padding:0 0 0 100px;
    }
    .content-left .verifyCode{
        width:100px;
    }
	#province,#city{
		width:90px;
		height:30px;
		font-size:15px;
	}
	#PlatformRegisterForm_logo_thumb,#PlatformRegisterForm_p_logo_thumb{
		width:140px;
	}
	.company_logo_remark,.PlatformRegisterForm_p_logo_thumb{
		postion:relative;
		top:0;
		left:0;
		color:red;
		font-size:15px;
	}
    
    
     /*------------------登陆框style开始---------------------------------------------------------*/
            .bg{
                    background: url(<?php echo Yii::app()->baseUrl."/images/login_register/login.jpg";?>) no-repeat;
            }
            .ui-right{
                    margin:24px 0 0 0;
                    width:353px;
                    background:#FFFFFF;
                    border:3px solid #cccccc;
                    border-color:rgba(204,204,204,0.2);
            }
            .ui-right-title{
                    width:100%;
                    height:45px;
            }
            .ui-right-title span{
                    display:block;
                    margin:1px auto 0px auto;
                    width:350px;
                    height:100%;
                    line-height:45px;
                    text-indent:40px;
                    background:#3498db;
                    font-size:14px;
                    font-family:'微软雅黑';
                    color:#FFFFFF;
            }
            .ui-right form{
                    padding-top:3px;
                    background:#f1f1f1;
            }
            .form-content{
                    background:#FFFFFF;
                    border:1px solid #FFFFFF;
            }
            .form-content .username{
                    margin-top:26px;
            }
            .ui-right form span{
                    display:block;
                    margin:16px auto 0 auto;
                    width:290px;
                    height:38px;
            }
            .ui-right form .user-pwd input{
                    /*display:block;*/
                    margin:3px 0px 0px 3px;
                    width:245px;
                    height:30px;
                    background:#FFFFFF;
            }

            .ui-right form .autologin{
                    margin-top:20px;
                    position:relative;
            }
            .ui-right form .autologin input{
				border:1px solid red;
				/*
                    margin-left:3px;
				*/
            }
            .password{
                    background-position:0 -120px;
            }
            .check-font{
				/*
                    position:absolute;
                    left:22px;
                    top:-1px;
				*/
            }
            .ui-right form .button{
                    margin-top:0px;
                    text-align:center;
                    line-height:38px;
                    background:#3498db;
            }
            .ui-right form .button input{
                    font-size:14px;
                    font-family:'宋体';
                    color:#FFFFFF;
            }
            .sea-reg{
                    margin-top:35px;
                    font-size:12px;
                    font-family:'宋体';
                    text-align:center;
                    background-position:106px -157px;
                    height:30px;
            }
            .sea-reg .sea{
                    color:#828282;
            }
            .sea-reg .reg{
                    color:#036dc1;
            }
            /*---------------------------------登陆框style结束------------------------------------------------------*/
    
    
    
    /*----------------------------------------Validform样式--------------------------------------------------------*/
.Validform_checktip{
	margin-left:8px;
	line-height:20px;
	height:20px;
	overflow:hidden;
	color:#999;
	font-size:12px;
}
.Validform_right{
	color:#71b83d;
	padding-left:20px;
	background:url(/style/images/success.png) no-repeat left center;
}
.Validform_wrong{
	color:red;
	padding-left:20px;
	white-space:nowrap;
	background:url(/style/images/error.png) no-repeat left center;
}
.Validform_loading{
	padding-left:20px;
	background:url(/style/images/loading01.gif) no-repeat left center;
}
.Validform_error{
	background-color:#ffe7e7;
}
#Validform_msg{color:#7d8289; font: 12px/1.5 tahoma, arial, \5b8b\4f53, sans-serif; width:280px; -webkit-box-shadow:2px 2px 3px #aaa; -moz-box-shadow:2px 2px 3px #aaa; background:#fff; position:absolute; top:0px; right:50px; z-index:99999; display:none;filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#999999'); box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);}
#Validform_msg .iframe{position:absolute; left:0px; top:-1px; z-index:-1;}
#Validform_msg .Validform_title{line-height:25px; height:25px; text-align:left; font-weight:bold; padding:0 8px; color:#fff; position:relative; background-color:#999;
background: -moz-linear-gradient(top, #999, #666 100%); background: -webkit-gradient(linear, 0 0, 0 100%, from(#999), to(#666)); filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#999999', endColorstr='#666666');}
#Validform_msg a.Validform_close:link,#Validform_msg a.Validform_close:visited{line-height:22px; position:absolute; right:8px; top:0px; color:#fff; text-decoration:none;}
#Validform_msg a.Validform_close:hover{color:#ccc;}
#Validform_msg .Validform_info{padding:8px;border:1px solid #bbb; border-top:none; text-align:left;}

/*----------------------------------------Validform样式结束--------------------------------------------------------*/
.popupLogin{
    position:absolute;
    top:200px;
    left:400px;
    z-index:999;
}
#closesign{
    font-weight:normal;
    font-size:18px;
    cursor:pointer;
    opacity:0.7;
}
.common-t-button{
    cursor:pointer;
}
</style>
<div class="login-page">
    <div class="login-header">
            <div class="login-header-content">
                <img src=<?php echo Yii::app()->baseUrl."/images/login_register/logo.jpg";?> />
                <span class="font">公司自助后台</span>
            </div>
    </div>
        <?php $form=$this->beginWidget('CActiveForm', array(
                 'id'=>'registerform',
                 'enableAjaxValidation'=>false,
                 //'action'=>Yii::app()->createUrl('loginregister/registercheck'),
                 'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'register-one j_Validform'),
        )); ?>
	<?php echo $form->errorSummary($model); ?>
			<div class="register-common-o">
				<span>游戏厂商注册通行证</span>
			</div>
  <!---------------------------------------------------------------------------------注册第一部分----------------------------------------------->
			
			<div class="register-one-content clearfix" id="register1">
				<div class="left content-left">
					<div>
						<span class="left-head">填写基本信息（<span class="sign">*</span>必填）</span>
						<div class="form">
							<div class="form-row">
								<?php echo $form->labelEx($model,'user'); ?>
								<?php echo $form->textField($model,'user',array(
									'autocomplete'=>'off',
									'datatype'=>'username',
									'errormsg'=>'开头不允许数字',
									'ajaxurl'=>  Yii::app()->createUrl('loginregister/checkrepeat',array('table'=>'Company')),
								)); ?>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'mail'); ?>
								<?php echo $form->textField($model,'mail',array(
									'autocomplete'=>'off',
									'datatype'=>'e',
									'errormsg'=>'请输入正确的邮箱',
									'ajaxurl'=>  Yii::app()->createUrl('loginregister/checkrepeat',array('table'=>'Company')),
								)); ?>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'pwd'); ?>
								<?php echo $form->passwordField($model,'pwd',array(
									'autocomplete'=>'off',
									'datatype'=>'*6-16',
									'maxLength'=>'16',
								)); ?>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'repeatpwd'); ?>
								<?php echo $form->passwordField($model,'repeatpwd',array(
									'autocomplete'=>'off',
									"datatype"=>"*",
									"recheck"=>get_class($model)."[pwd]",
									"errormsg"=>"您两次输入的密码不一致！",
									'maxLength'=>'16',
								)); ?>
							</div>
						</div>
					</div>
					<div>
						<span class="left-head">填写联系人信息（<span class="sign">*</span>必填）</span>
						<div class="form">
							<div class="form-row">
								<?php echo $form->labelEx($model,'c_name'); ?>
								<?php echo $form->textField($model,'c_name',array(
									'autocomplete'=>'off',
									'datatype'=>'*',
									'errormsg'=>'',
								)); ?>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'post'); ?>
								<?php echo $form->textField($model,'post',array(
									'autocomplete'=>'off',
									'datatype'=>'*',
									'errormsg'=>'',
								)); ?>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'c_qq'); ?>
								<?php echo $form->textField($model,'c_qq',array(
									'autocomplete'=>'off',
									'datatype'=>'n',
									'errormsg'=>'',
								)); ?>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'c_tel'); ?>
								<?php echo $form->textField($model,'c_tel',array(
									'autocomplete'=>'off',
									'datatype'=>'*',
									'errormsg'=>'',
								)); ?>
							</div>
						</div>
					</div>
					<div class="buttons clearfix">
						<a href="#" class="next-button left registerButton2">下一步</a>
					</div>
					
				</div>
				<div class="right register-common-t">
					<span class="common-t-title">已有5884账号，请直接登陆</span>
					<span class="common-t-button">登陆</span>
				</div>
                    </div>
   <!---------------------------------------------------------------------------------注册第二部分----------------------------------------------->
            <div class="register-one-content clearfix" id="register2">
				<div class="left content-left">
					<div>
						<span class="left-head">填写公司信息（保密，<span class="sign">*</span>必填）</span>
						<div class="form">
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'name'); ?>
                                                                <?php echo $form->textField($model,'name',array(
                                                                    'autocomplete'=>'off',
                                                                    'datatype'=>'*',
                                                                    'errormsg'=>'',
                                                                    'ajaxurl'=>  Yii::app()->createUrl('loginregister/checkrepeat',array('table'=>'Company')),
                                                                )); ?>
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'p_name'); ?>
                                                                <?php echo $form->textField($model,'p_name',array(
                                                                    'autocomplete'=>'off',
                                                                    'datatype'=>'*',
                                                                    'errormsg'=>'',
                                                                    'ajaxurl'=>  Yii::app()->createUrl('loginregister/checkrepeat',array('table'=>'Platform')),
                                                                )); ?>
								
							</div>
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'p_address'); ?>
                                                                <?php echo $form->textField($model,'p_address',array('value'=>'http://')); ?>
							</div>
							
							
							<div class="form-row">
                                                                <?php echo $form->labelEx($model,'address'); ?>
                                                                <?php echo $form->textField($model,'address',array(
                                                                    'autocomplete'=>'off',
                                                                    'datatype'=>'*',
                                                                    'errormsg'=>'',
                                                                )); ?>
								
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'tel'); ?>
								<?php echo $form->textField($model,'tel',array(
									'autocomplete'=>'off',
									'datatype'=>'*',
									'errormsg'=>'',
								)); ?>
								
							</div>
							<div class="form-row">
								<label>&nbsp;所在城市：</label>
								<select id="province" name="<?php echo get_class($model)."[city]" ;?>">
									<option  value="0">请选择省</option>
								</select>
								<select id="city" name="<?php echo get_class($model)."[city1]" ;?>">
									<option  value="0">请选择市</option>
								</select>
								市（<span class="sign">*</span>必填）
								
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'p_logo_thumb'); ?>
								<?php echo $form->fileField($model,'p_logo_thumb'); ?>
							</div>
							<div class="form-row">
								 <?php echo $form->labelEx($model,'brief'); ?>
								 <?php echo $form->textArea($model,'brief',array(
									 'autocomplete'=>'off',
									 "cols"=>50,
									 "rows"=>6,
									 'datatype'=>'*',
									 'errormsg'=>'',
								 )); ?>
							</div>
							<div class="form-row">
								<?php echo $form->labelEx($model,'verifyCode'); ?>
								<?php echo $form->textField($model,'verifyCode',array('class'=>'verifyCode')); ?>
                                                                <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer'))); ?> 
							</div>
							<div class="form-checkbox rBox">
                                                                <?php echo $form->checkBox($model,'checkbox',array("class"=>"aBox form-checkbox-con registerCheckbox")); ?>
								<span class="form-checkbox-title">
                                                                    同意遵守<a href="#">注册协议</a>，注册后请联系客户审核账户。<a href="tencent://message/?uin=364557832&Site=http://77ya.com/&Menu=yes"><img src=<?php echo Yii::app()->baseUrl."/images/login_register/QQ.jpg";?> /></a>
								</span>
							</div>	
						</div>
					</div>
					<div class="buttons clearfix">
						<a href="#" class="next-button left registerButton1">上一步</a>
						<a href="#" class="next-button left registerSubmit">立即注册</a>
					</div>
				</div>
				<div class="right register-common-t">
					<span class="common-t-title">已有5884账号，请直接登陆</span>
					<span class="common-t-button">登陆</span>
				</div>
			</div>
		<?php $this->endWidget(); ?>
      
</div>
 <div class="ui-right popupLogin none" id="popupLogin">
     <div class="ui-right-title">
         <span>
             登陆5884，一起玩游戏！
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <b id="closesign">×</b>
         </span>
     </div>
        <form action=<?php echo Yii::app()->createUrl("self/login");?>  method="post">
			<div class="form-content">
				<span class="username user-pwd bg"><input type="text" name="LoginForm[username]" id="username"/></span>
				<span class="password user-pwd bg"><input type="password" name="LoginForm[password]" id="password"/></span>
				<span class="autologin">
					<div class="rememberpassword">
						<input id="ytLoginForm_rememberMe" type="hidden" value="0" name="LoginForm[rememberMe]">
						<input type="checkbox" name="LoginForm[rememberMe]"/>
						<b class="normal check-font">记住密码</b>
						<input type="checkbox" name="LoginForm[autologin]"/>
						<b class="normal check-font">自动登录</b>
					</div>
				</span>
				<span class="button"><input type="submit" value="登&nbsp;录"/></span>
			</div>
		</form>
        <div class="sea-reg bg">
                <a href="#" class="sea">忘记密码</a><!--
                --><a href="<?php echo Yii::app()->createUrl('loginregister/platformRegister');?>" class="reg">&nbsp;|&nbsp;免费注册</a>
        </div>
</div>
<style>
    .button ,.button input{cursor: pointer;}
    .form-content .focusinUsernameBg{background-position: 0 0;}
    .form-content .focusoutUsernameBg{background-position: 0 -39px;}
    .form-content .focusinPwdBg{background-position: 0 -80px;}
    .form-content .focusoutPwdBg{background-position: 0 -120px;}
 </style>
<script>
      var clearuserstate = function (){
            $("#username").parent().removeClass("focusinUsernameBg focusoutUsernameBg");
        }
        var clearpwdstate = function (){
            $("#password").parent().removeClass("focusinPwdBg focusoutPwdBg");
        }
    $(function (){
        $("#username").focusin(function (){
            clearuserstate();
            $(this).parent().addClass("focusinUsernameBg");
        }).focusout(function (){
            clearuserstate();
            if($(this).val() == "") $(this).parent().addClass("focusoutUsernameBg");
            else $(this).parent().addClass("focusinUsernameBg");
        });
         $("#password").focusin(function (){
            clearpwdstate();
            $(this).parent().addClass("focusinPwdBg");
        }).focusout(function (){
            clearpwdstate();
            if($(this).val() == "") $(this).parent().addClass("focusoutPwdBg");
            else $(this).parent().addClass("focusinPwdBg");
        });
        $("#closesign").click(function (){
            mask.removemask();
            $("#popupLogin").addClass("none");
        });
        $(".common-t-button").click(function (){
            mask.addmask();
            $("#popupLogin").removeClass("none");
        });
    });
  
    mask = {
    maskID : "base_mask",
    mask : "",
    addmask : function (){
        var newMaskID = this.maskID;  //遮罩层id
        var  newMaskWidth =document.body.scrollWidth;//遮罩层宽度
        var  newMaskHeight =document.body.scrollHeight;//遮罩层高度    
          //mask遮罩层  
        var newMask = document.createElement("div");//创建遮罩层
        newMask.id = newMaskID;//设置遮罩层id
        newMask.style.position = "absolute";//遮罩层位置
        newMask.style.zIndex = "1";//遮罩层zIndex
        newMask.style.width = newMaskWidth + "px";//设置遮罩层宽度
        newMask.style.height = newMaskHeight + "px";//设置遮罩层高度
        newMask.style.top = "0px";//设置遮罩层于上边距离
        newMask.style.left = "0px";//设置遮罩层左边距离
        newMask.style["background"] = "#000";//#33393C//遮罩层背景色
        newMask.style.filter = "alpha(opacity=40)";//遮罩层透明度IE
        newMask.style.opacity = "0.40";//遮罩层透明度FF
        this.mask = newMask;
        document.body.appendChild(this.mask);//遮罩层添加到DOM中
        Ccenter("popupLogin");            //遮罩层上面的弹出框的id----popupLogin
    },
    removemask : function (){
        document.body.removeChild(this.mask);//移除遮罩层
        $(window).unbind();
    }
}
function Ccenter(newID){
     var scrolltop = 40; 
     $(window).scrollTop(scrolltop);
     $(window).scroll(function (){
             $(window).scrollTop(scrolltop);
     });
     var newid = $("#"+newID);
     var left = $(window).width()/2 - newid.width()/2;
     var top = $(window).height()/2 - newid.height()/2;
     newid.css({left:left,top:top});
}
</script>
<script>
        register = {
            init : function (){
                    $(".registerCheckbox").attr("checked",true);
                    $(".registerSubmit").click(function (){
                        if(!$(".registerCheckbox").attr("checked")) return;
                        else $("#registerform").submit();
                    });
                    register.step(1);
                    $(".registerButton1").click(function (){
                       register.step(1);
                    });
                    $(".registerButton2").click(function (){
                       register.step(2);
                    });
                    $(".registerButton3").click(function (){
                       register.step(3);
                    });
            },
            step : function (n){
                for(var j = 1;j<= 3;j ++){
                    if(n == j) $("#register"+j).removeClass("none");
                    else  $("#register"+j).addClass("none");
                }
            }
        }
        $(function(){
            register.init();
            $("body").jQueryCity({
                selectId : {
                    province : "province",
                    city     : "city" ,
                    area     : "area"
                },
                default : {
                    province : "广东省" ,
                    city : "茂名市" 
                   // area : "西湖区"
                }
            })
			var company_logo_remark = "<span class='company_logo_remark'>规格(130*46)</span>";
			$("#PlatformRegisterForm_logo_thumb").after(company_logo_remark);
			var PlatformRegisterForm_p_logo_thumb = "<span class='PlatformRegisterForm_p_logo_thumb'>规格(130*46)</span>";
			$("#PlatformRegisterForm_p_logo_thumb").after(PlatformRegisterForm_p_logo_thumb);
			var state = <?php echo $state;?>;
			if(state) register.step(1);
        })
</script>
<script>
    seajs.use('/style/js/sea.config');
    var nvalidform;
    define(function(require,exports,module) {
        require.async(['other/validform/validform.min',
            
        ],function(validform){
            validform.tiptype = 3;
            valid = validform.valid();
			valid.addRule([
			{
				ele:"#PlatformRegisterForm_pwd",
				datatype:"pwd",
				nullmsg:"请输入密码！",
				errormsg:"至少6个字符,最多16个字符!"
			},
			{
				ele:"#PlatformRegisterForm_c_qq",
				datatype:"qq",
				nullmsg:"请输入QQ号码！",
				errormsg:"QQ号码格式有误！"
			},
			{
				ele:"#PlatformRegisterForm_c_tel",
				datatype:"phone",
				nullmsg:"请输入电话号码！",
				errormsg:"请按此格式0668-2328114或13437554884填写！"
			},
			{
				ele:"#PlatformRegisterForm_p_address",
				datatype:"http",
				nullmsg:"请输入网址！",
				errormsg:"网址格式有误，请在前面添加http://"
			},
			{
				ele:"#PlatformRegisterForm_p_logo_thumb",
				datatype:"*",
				nullmsg:"请选择图片！",
				errormsg:""
			},
			{
				ele:"#PlatformRegisterForm[tel]",
				datatype:"phone",
				nullmsg:"请输入电话号码！",
				errormsg:"请按此格式0668-2328114或13437554884填写！"
			}
			]);
        });
    });
</script>

