<?php
    $actions = array(
        'create',
    );
    $active = array();
    foreach($actions as $a){        
        if($a==$this->action->id)
            $active[] = 'btn-success';
        else $active[] = '';
    }
    
?>
<div class="nav relative">
    <div>
        <ul class="nav nav-tabs">
             <li class="active">
                <a href="<?php echo Yii::app()->createUrl('sservice/admin');?>">开服管理</a>
            </li>
			<!--
			<li class="">
                <a href="<?php // echo Yii::app()->createUrl('setmeal/admin');?>">套餐内容管理</a>
            </li>
			-->
			<li class="">
                <a href="<?php echo Yii::app()->createUrl('preferential/admin');?>">套餐管理</a>
            </li>
			<!--
			<li class="">
                <a href="<?php //echo Yii::app()->createUrl('buymeal/admin');?>">套餐购买情况管理</a>
            </li>
			-->
			<li class="">
                <a href="<?php echo Yii::app()->createUrl('charge/admin');?>">充值管理</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in">
				<a class="btn" href="<?php echo Yii::app()->createUrl('sservice/admin');?>">开服列表</a>
				<a class="btn" href="<?php echo Yii::app()->createUrl('company/myadd');?>">添加开服</a>
				<a class="btn <?php echo $active[0]?>" href="<?php echo Yii::app()->createUrl('nominatemoney/create');?>">编辑推荐费用</a>
                <!--
                <a class="btn <?php //echo $active[2]?>" href="<?php echo Yii::app()->createUrl('sserviceself/create');?>">添加常用服务器</a>
                -->
            </div>
<!--            <div id="yw2_tab_2" class="tab-pane fade">
                <a class="btn" href="/game/index.php/platform/create">添加游戏平台</a>
                <a class="btn" href="/game/index.php/platform/uncheck">未审核平台列表</a>
                <a class="btn" href="/game/index.php/platform/create">已拒绝平台列表</a>
                <a class="btn" href="/game/index.php/platform/create">已通过平台列表</a>
            </div><div id="yw2_tab_3" class="tab-pane fade">
                <a class="btn" href="/game/index.php/linkman/create">添加平台联系人</a>
                <a class="btn" href="/game/index.php/linkman">平台联系人列表</a>
            </div>-->
        </div>
    </div>
</div>