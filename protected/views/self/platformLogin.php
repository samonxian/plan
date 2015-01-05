
 <style type="text/css" charset="utf-8">		
            .login-content{
                    position:relative;
                    width:100%;
                    height:390px;
                    background:#f5f5f5;
                    border-top:2px solid #efefef;
                    border-bottom:2px solid #efefef;
            }
            .login-content-line{
                    display:block;
                    position:absolute;
                    top:-1px;
                    left:0px;
                    width:98.5%;
                    height:0px;
                    border:1px solid #cccccc;
            }
            .login-content-content{
                    width:970px;
                    height:100%;
                    margin:0 auto;
                    text-align:left;
            }
            .ui-left{
                    margin:28px 0 0 0;
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
			
        </style>
<div class="login-page">
		<div class="login-header">
			<div class="login-header-content">
                            <img src=<?php echo Yii::app()->baseUrl."/images/login_register/logo.jpg";?> />
				<span class="font">公司自助后台</span>
			</div>
		</div>
		<div class="login-content">
			<span class="login-content-line"></span>
			<div class="login-content-content clearfix">
				<div class="ui-left left">
					<img src=<?php echo Yii::app()->baseUrl."/images/login_register/leftui.jpg";?> />
				</div>
				<div class="ui-right right">
					<div class="ui-right-title"><span>登陆5884，一起玩游戏！</span></div>
					<form action=<?php echo Yii::app()->createUrl("self/login");?>  method="post">
						<div class="form-content">
							<span class="username user-pwd bg"><input type="text" name="LoginForm[username]" id="username"/></span>
							<span class="password user-pwd bg"><input type="password" name="LoginForm[password]" id="password"/></span>
							
							<span class="autologin">
								<div class="rememberpassword">
									<input id="ytLoginForm_rememberMe" type="hidden" value="0" name="LoginForm[rememberMe]">
									<input type="checkbox" name="LoginForm[rememberMe]" checked="checked"/>
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
			</div>
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
            });
        </script>

