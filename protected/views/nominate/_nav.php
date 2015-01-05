<?php
    $actions = array(
       
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
                <a  href="<?php echo Yii::app()->createUrl('sserviceself/admin');?>">开服管理</a>
            </li>
			<li class="">
                <a  href="<?php echo Yii::app()->createUrl('preferentialself/admin');?>">套餐列表</a>
            </li>
			<li class="">
                <a  href="<?php echo Yii::app()->createUrl('chargeself/admin');?>">充值与消费记录</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in">
                <a class="btn" href="<?php echo Yii::app()->createUrl('sserviceself/admin');?>">开服列表</a>
                <a class="btn" href="<?php echo Yii::app()->createUrl('sserviceself/create');?>">我要开服</a>
                
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