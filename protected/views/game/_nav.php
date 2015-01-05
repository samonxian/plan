<?php
    $actions = array(
        'create',
        'uncheck',
        'isrejected',
        'ispassed',
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
                <a  href="<?php echo Yii::app()->createUrl('game');?>">游戏管理</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in">
                <a class="btn <?php echo $active[0]?>" href="<?php echo Yii::app()->createUrl('game/create');?>">添加游戏</a>
                <a class="btn <?php echo $active[1]?>" href="<?php echo Yii::app()->createUrl('game/uncheck');?>">未审核游戏列表</a>
                <a class="btn <?php echo $active[2]?>" href="<?php echo Yii::app()->createUrl('game/isrejected');?>">已拒绝游戏列表</a>
                <a class="btn <?php echo $active[3]?>" href="<?php echo Yii::app()->createUrl('game/ispassed');?>">已通过游戏列表</a>
                <a class="btn" href="<?php echo Yii::app()->createUrl('game/set');?>">生成游戏搜索缓存</a>
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