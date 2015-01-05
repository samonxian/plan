<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0043)http://kf.07073.com/company/member/register -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=GBK">

<title>用户注册</title>
<meta name="keywords" content="用户注册">
<meta name="description" content="用户注册">
<link href="<?php echo Yii::app()->baseUrl;?>/re_files/zz.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/re_files/jquery-1.4.4.min.js"></script>
<script type="text/javascript">
$(function () {
	$("#username").focusout(function() {
		$.post('http://kf.07073.com/company/member//re_files/checkUser/' + Math.random(), {"username" : $('#username').val()}, function (data) {
			if (data == '1') {
				$('#is_username').html('<img src="http://img1.07073.com/_13css/kaifu/backstage/img/v.gif" />');
			}
			else if (data == '-1') {
				$('#is_username').html('<span class="xRed">用户名不能为空</span>');
			}
			else if (data == '-2') {
				$('#is_username').html('<span class="xRed">用户名已存在</span>');
			}
		});
	});
});

</script>
</head>

<body class="reg">
  <div class="regWrapper">
    <h2><img src="<?php echo Yii::app()->baseUrl;?>/re_files/lo.png" alt="07073厂商自助后台"></h2>
	<div class="nav">
	  <ul>
	    <li><a class="current" href="<?php echo Yii::app()->baseUrl;?>/stage/lo">登 录</a></li>
		<li ><a href="javascript:;">注 册</a></li>
	  </ul>
	</div>
	
	<div class="thisLogTable">
	  <form action="./re_files/re.htm" method="post" accept-charset="gbk">	    <table border="0" cellspacing="10" cellpadding="0">
	   	  		  <tbody><tr>
			<td>用户名/Email</td>
		  </tr>
		  <tr>
			<td><input type="text" name="username" value="填写用户名/Email" class="tti tbg1" onfocus="if(this.value==&#39;填写用户名/Email&#39;){this.value=&#39;&#39;}" onblur="if(this.value==&#39;&#39;){this.value=&#39;填写用户名/Email&#39;}"></td>
		  </tr>
		  <tr>
			<td>登录密码</td>
		  </tr>
		  <tr>
			<td><input type="password" name="password" value="输入密码" class="tti tbg2" onfocus="if(this.value==&#39;输入密码&#39;){this.value=&#39;&#39;}" onblur="if(this.value==&#39;&#39;){this.value=&#39;输入密码&#39;}"></td>
		  </tr>
		  <tr>
			<td><span class="fr"><input type="submit" onmouseout="this.className=&#39;&#39;" onmousedown="this.className=&#39;tt2&#39;" onmouseover="this.className=&#39;tt2&#39;" name="" value="登 录" class=""></span>
			<i class="fl"><input type="checkbox" name="remember" value="1"> 记住用户</i></td>
		  </tr>
		  <tr>
			<td><em>注：如忘记登录密码请联系 QQ：1198307073</em></td>
		  </tr>
		</tbody></table>
	  </form>
	</div>
	
  </div>


</body></html>