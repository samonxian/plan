<?php
    $actions = array(
		'create',
        'index',
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
            <li>
                <a  href="<?php echo Yii::app()->createUrl('company');?>">公司审核管理</a>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('platform');?>">平台审核管理</a>
            </li>
            <li class="active">
                <a  href="<?php echo Yii::app()->createUrl('linkman');?>"> 联系人管理</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in">
              
                <a class="btn <?php echo $active[1]?>" href="<?php echo Yii::app()->createUrl('linkman');?>">联系人列表</a>
				<a class="btn <?php echo $active[0]?>" href="<?php echo Yii::app()->createUrl('linkman/Excel');?>">下载Excel表格</a>
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