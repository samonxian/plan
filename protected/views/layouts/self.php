<!DOCTYPE html><head>	<meta charset="utf-8">        <?php $stylePath = Yii::app()->baseUrl . '/modelStyle/admin/01';?>	<link rel="stylesheet" type="text/css" href="/style/css/base.css"/>           <link rel="stylesheet" type="text/css" href="/style/css/bootstrap/bootstrap.min.css"/>         <link rel="stylesheet" type="text/css" href="/style/css/validform/validate.css"/>  	<link media="all" rel="stylesheet" type="text/css" href="<?php echo $stylePath;?>/css/all.css" />        <script src="/style/js/sea.js"></script>	<?php Yii::app()->ClientScript->registerCoreScript('jquery');?>        <?php Yii::app()->ClientScript->registerScriptFile('/style/js/other/bootstrap/bootstrap.min.js');?>                <script>seajs.use('<?php echo Yii::app()->baseUrl;?>/js/admin/article_system/main.js');</script>		<script type="text/javascript" src="/style/js/other/jquery/jquery.main.js"></script>        	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="<?php echo $stylePath;?>/css/ie.css" /><![endif]-->	<style>		#sidebar{			min-height:600px;		}	</style></head><body>	<div id="wrapper">		<div id="content">			<div class="c1 relative">                            <?php if (!empty($this->breadcrumbs)): ?>                            <?php                                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(                                    'links' => $this->breadcrumbs,                                    'separator' => '/',                                     //'homeLink' => CHtml::link( '公司后台主页', Yii::app()->createUrl('self')),                                ));                            ?>                            <?php endif ?>                            <div class="controls">                                    <div class="profile-box relative">                                            <span class="profile">                                                    <a href="#" class="section">                                                            <img class="image" src="<?php echo $stylePath;?>/images/img1.png" alt="image description" width="26" height="26" />                                                            <span class="text-box">                                                                    欢迎                                                                    <strong class="name"><?php echo Yii::app()->session["name"]; ?></strong>                                                            </span>                                                    </a>                                                    <a href="#" class="opener">opener</a>                                            </span>                                            <a href="<?php echo Yii::app()->createUrl('self/logout'); ?>" class="btn-on">在线</a>                                    </div>                            </div>							<div style="position:absolute;top:70px;right:250px;font-weight:bold;">								<span>账户余额：<span><?php echo Tglobal::balance(); ?></span>元</span>								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;								<span>开服套餐剩余条数：<span><?php echo Tglobal::balanceNumber(0); ?></span>条</span>								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;								<span>礼包套餐剩余条数：<span><?php echo Tglobal::balanceNumber(1); ?></span>条</span>							</div>                                                         <div class="a_contents">                                <?php $this->renderPartial('_nav');?>                                <?php echo $content?>                            </div>			</div>		</div>                <?php                    $side_active = array();                    for($i=0;$i<4;$i++){                        $side_active[$i] = '';                    }                    $side_bar = array(                        'companyself'=>0,                        'platformself'=>0,                        'linkmanself'=>0,                        'gameself'=>1,                        'pgame'=>1,                        'sserviceself'=>2,						'preferentialself'=>2,						'buymealself'=>2,						'chargeself'=>2,						'nominate'=>2,                    );                    $side_active[$side_bar[$this->id]] = 'active';                                    ?>		<aside id="sidebar">			<strong class="logo"><a href="#">lg</a></strong>			<ul class="tabset buttons">                                <?php                                    if(isset(Yii::app()->session['back'])){                                ?>                                 <li class="">					<a href="<?php echo Yii::app()->createUrl('company/logout');?>" class="ico1">总后台</a>				</li>                                <?php                                    }                                ?>				<li class="<?php echo $side_active[0];?>">					<a href="<?php echo Yii::app()->createUrl('companyself/index');?>" class="ico1">公司管理</a>				</li>				<li class="<?php echo $side_active[1];?>">                                    <a href="<?php echo Yii::app()->createUrl('gameself/index');?>" class="ico2">游戏管理</a>				</li>				<li class="<?php echo $side_active[2];?>">					<a href="<?php echo Yii::app()->createUrl('sserviceself/index');?>" class="ico3">开服管理</a>				</li>				<li class="<?php echo $side_active[3];?>">					<a href="#tab-4" class="ico4">发号管理</a>				</li>							</ul>			<span class="shadow"></span>		</aside>	</div></body></html>