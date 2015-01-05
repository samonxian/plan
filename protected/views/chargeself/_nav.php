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
                <a  href="<?php echo Yii::app()->createUrl('sserviceself/admin');?>">开服管理</a>
            </li>
			<!--
			<li class="">
                <a href="<?php //echo Yii::app()->createUrl('setmeal/admin');?>">套餐内容管理</a>
            </li>
			-->
			<li class="">
                <a href="<?php echo Yii::app()->createUrl('preferentialself/admin');?>">套餐列表</a>
            </li>
			<!--
			<li class="">
                <a href="<?php //echo Yii::app()->createUrl('buymeal/admin');?>">套餐购买情况管理</a>
            </li>
			-->
			<li class="active">
                <a  href="<?php echo Yii::app()->createUrl('chargeself/admin');?>">充值与消费记录</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in">
                <a class="btn <?php echo $active[0]?>" href="<?php echo Yii::app()->createUrl('chargeself/admin');?>">充值记录</a>
				<!--
                <a class="btn <?php //echo $active[1]?>" href="<?php //echo Yii::app()->createUrl('charge/create');?>">添加充值</a>
				-->
				<a class="btn" href="<?php echo Yii::app()->createUrl('buymealself/admin');?>">套餐消费记录</a>
				<!--
                <a class="btn" href="<?php //echo Yii::app()->createUrl('buymeal/create');?>">套餐购买</a>
				-->
            </div>
        </div>
    </div>
</div>