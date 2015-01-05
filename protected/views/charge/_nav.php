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
                <a  href="<?php echo Yii::app()->createUrl('sservice/admin');?>">开服管理</a>
            </li>
			<!--
			<li class="">
                <a href="<?php //echo Yii::app()->createUrl('setmeal/admin');?>">套餐内容管理</a>
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
			<li class="active">
                <a  href="<?php echo Yii::app()->createUrl('charge/admin');?>">充值管理</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in">
                <a class="btn <?php echo $active[0]?>" href="<?php echo Yii::app()->createUrl('charge/admin');?>">充值列表</a>
                <a class="btn <?php echo $active[1]?>" href="<?php echo Yii::app()->createUrl('charge/create');?>">添加充值</a>
				<a class="btn" href="<?php echo Yii::app()->createUrl('buymeal/admin');?>">套餐购买列表</a>
				<!--
                <a class="btn" href="<?php //echo Yii::app()->createUrl('buymeal/create');?>">套餐购买</a>
				-->
            </div>
        </div>
    </div>
</div>