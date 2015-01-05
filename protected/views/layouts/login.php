<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/css/base.css"/>   
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/css/index.css"/>   
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/css/login_register_common.css"/>   

        <script src="/style/js/sea.js"></script>
        <?php Yii::app()->ClientScript->registerCoreScript('jquery');?>
        <script>seajs.use('<?php echo Yii::app()->baseUrl;?>/js/admin/article_system/main.js');</script>
        <script>seajs.use('<?php echo Yii::app()->baseUrl;?>/js/admin/article_system/<?php echo $this->action->id;?>.js');</script>
		<style>
			.ui-right form .button input{
				display:block;
				width:100%;
				height:100%;
			}
		</style>
    </head>
<body style="position:relative">

<div class="content">
    <?php echo $content;?>
</div>
<div class="footer">
	<div class="footer-about">
		<div class="lay-out">
			<div class="links">
				<a class="about" href="#">关于5884</a> -
				<a class="map" href="#">网站地图</a> -
				<a class="job" href="#">诚聘英才</a> -
				<a class="ads" href="#">运营商入口</a>
			</div>
			<div class="other">
				<div class="msg">
					Copyright 2002-2011 5884.com, All Rights Reserved. 5884.com 版权所有		
				</div>
				<div class="icp">
					<span>
						<a href="http://www.beianbeian.com/beianxinxi/04db5948-7fe1-42dc-b029-0d90d18d3bf3.html" target="_black">沪ICP备12025382号-6</a>
					</span>|
					<span>新闻：kaifu@5884.com</span>|
					<span>商务电话：13437554884</span>|
					<span>联系QQ：267003691&nbsp;&nbsp;&nbsp;97534210</span>	
				</div>
			</div>
		</div>
	</div>
</div>


</body>
</html>

