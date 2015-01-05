
<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/base.css" media="all" type="text/css" rel="stylesheet">
        <link href="css/ie.css" media="all" type="text/css" rel="stylesheet">
        <link href="css/register.css" media="all" type="text/css" rel="stylesheet">
	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="#" /><![endif]-->
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
        </style>
</head>
<body>
	<div class="login-page">
		<div class="login-header">
			<div class="login-header-content">
				<img src="images/logo.jpg" />
				<span class="font">公司自主平台</span>
			</div>
		</div>
		<div class="register-one">
			<div class="register-common-o">
				<span>游戏厂商注册通行证</span>
			</div>
			<div class="register-one-content clearfix">
				<div class="left content-left">
					<div>
						<span class="left-head">填写平台信息（保密，可选择填写）</span>
						<div class="form">
							<div class="form-row">
								<label>&nbsp;平台名称：</label>
								<input type="text"/>
								<span class="error-tip">请输入公司名称</span>
							</div>
							<div class="form-row">
								<label>&nbsp;平台简称：</label>
								<input type="text"/>
								<span class="error-tip">请输入公司名称</span>
							</div>
							<div class="form-row">
								<label>&nbsp;平台网址：</label>
								<input type="text" value="http://"/>
								<span class="error-tip">请输入公司名称</span>
							</div>
							<div class="form-row">
								<label>&nbsp;平台LOGO：</label>
								<input type="file"/>
								<span class="error-tip none">请输入客户电话</span>
							</div>	
							<div class="form-row">
								<label>&nbsp;平台简介：</label>
								<textarea cols="50" rows="6"></textarea>
								<span class="error-tip none">请输入客户电话</span>
							</div>
							<div class="form-row">
								<label>&nbsp;&nbsp;&nbsp;验证码：</label>
								<input type="text"/>
								<span class="error-tip none">请输入客户电话</span>
							</div>	
							<div class="form-checkbox rBox">
								<input type="checkbox" class="aBox form-checkbox-con"/>
								<span class="form-checkbox-title">
									同意遵守<a href="#">注册协议</a>，注册后请联系客户审核账户。<a href="#"><img src="images/QQ.jpg"/></a>
								</span>
							</div>	
						</div>
					</div>
					<div class="buttons clearfix">
						<a href="#" class="next-button left">立即注册</a>
					</div>
					
				</div>
				<div class="right register-common-t">
					<span class="common-t-title">已有5884账号，请直接登陆</span>
					<span class="common-t-button">登陆</span>
				</div>
			</div>
		</div>
	</div>
</body>
</html>