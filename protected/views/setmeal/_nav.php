<?php
    $actions = array(
        'admin',
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
            <li class="">
                <a  href="<?php echo Yii::app()->createUrl('sservice/admin');?>">开服游戏管理</a>
            </li>
			<li class="active">
                <a href="<?php echo Yii::app()->createUrl('setmeal/admin');?>">套餐内容管理</a>
            </li>
			<li class="">
                <a href="<?php echo Yii::app()->createUrl('preferential/admin');?>">套餐优惠信息管理</a>
            </li>
			<li class="">
                <a href="<?php echo Yii::app()->createUrl('buymeal/admin');?>">套餐购买情况管理</a>
            </li>
			<li class="">
                <a  href="<?php echo Yii::app()->createUrl('charge/admin');?>">充值管理</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in">
                <a class="btn <?php echo $active[0]?>" href="<?php echo Yii::app()->createUrl('setmeal/admin');?>">套餐内容列表</a>
                <a class="btn <?php echo $active[1]?>" href="<?php echo Yii::app()->createUrl('setmeal/create');?>">添加套餐内容</a>
            </div>
        </div>
    </div>
</div>