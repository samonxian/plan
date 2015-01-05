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
	    <li><a href="<?php echo Yii::app()->baseUrl;?>/stage/lo">登 录</a></li>
		<li class="current"><a href="javascript:;">注 册</a></li>
	  </ul>
	</div>
	
	<div class="thisRegTable">
	  <form action="<?php echo Yii::app()->baseUrl;?>/re_files/re.htm" method="post" accept-charset="gbk">	    <h3>请填写注册信息<i>（必填）</i></h3>
	    <table width="100%" border="0" cellspacing="10" cellpadding="0">
		  <tbody><tr>
			<td class="setr">用户名:</td>
			<td width="222"><input id="username" type="text" name="username" value=""></td>
			<td id="is_username"></td>
		  </tr>
		  <tr>
			<td class="setr">Email:</td>
			<td width="222"><input type="text" name="email" value=""></td>
			<td></td>
		  </tr>
		  <tr>
			<td class="setr">设置密码:</td>
			<td width="222"><input type="password" name="password1" value=""></td>
			<td></td>
		  </tr>
		  <tr>
			<td class="setr">确认密码:</td>
			<td width="222"><input type="password" name="password2" value=""></td>
			<td>&nbsp;</td>
		  </tr>
		</tbody></table>
		
		<h3>请填写基本信息<i>（必填）</i></h3>
	    <table width="100%" border="0" cellspacing="10" cellpadding="0">
		  <tbody><tr>
			<td class="setr">运营平台:</td>
			<td width="222"><input type="text" name="thread" value=""></td>
			<td></td>
		  </tr>
		  <tr>
			<td class="setr">平台官网:</td>
			<td width="222"><input type="text" name="official_website" value=""></td>
			<td></td>
		  </tr>
		  <tr>
			<td class="setr">联系人:</td>
			<td width="222"><input type="text" name="linkman" value=""></td>
			<td></td>
		  </tr>
		  <tr>
			<td class="setr">职务:</td>
			<td width="222"><input type="text" name="position" value=""></td>
			<td></td>
		  </tr>
		</tbody></table>
		
		<h3>请填写联系方式<i>（必填）</i></h3>
	    <table width="100%" border="0" cellspacing="10" cellpadding="0">
		  <tbody><tr>
			<td class="setr">联系电话:</td>
			<td width="222"><input type="text" name="tel" value=""></td>
			<td></td>
		  </tr>
		  <tr>
			<td class="setr">QQ/MSN:</td>
			<td width="222"><input type="text" name="im" value=""></td>
			<td></td>
		  </tr>
		</tbody></table>
		
		<p class="btnReg"><input type="submit" onmouseout="this.className=&#39;&#39;" onmousedown="this.className=&#39;br2&#39;" onmouseover="this.className=&#39;br2&#39;" name="" value="提 交" class=""></p>
	  </form>
	</div>
	
  </div>


</body></html>