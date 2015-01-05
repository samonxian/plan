<?php
    $actions = array(
        'admin',
		'gift',
        'create',
    );
    $active = array();
    foreach($actions as $a){
		if($this->action->id == "gift"){
			$active[0] = 'btn-success';
			$active[1] = '';
			$active[2] = '';
		}else{
			if($a==$this->action->id)
				$active[] = 'btn-success';
			else $active[] = '';
		}	
    }
    
?>
<div class="nav relative">
    <div>
        <ul class="nav nav-tabs">
            <li class="">
                <a href="<?php echo Yii::app()->createUrl('sserviceself/admin');?>">开服管理</a>
            </li>
			<!--
			<li class="">
                <a href="<?php // echo Yii::app()->createUrl('setmeal/admin');?>">套餐内容管理</a>
            </li>
			-->
			<li class="active">
                <a href="<?php echo Yii::app()->createUrl('preferentialself/admin');?>">套餐列表</a>
            </li>
			<!--
			<li class="">
                <a href="<?php //echo Yii::app()->createUrl('buymeal/admin');?>">套餐购买情况管理</a>
            </li>
			-->
			<li class="">
                <a  href="<?php echo Yii::app()->createUrl('chargeself/admin');?>">充值与消费记录</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in">
				<!--
                <a class="btn <?php //echo $active[0]?>" href="<?php //echo Yii::app()->createUrl('preferential/admin');?>">套餐列表</a>
				-->
				<!--
                <a class="btn <?php //echo $active[1]?>" href="<?php //echo Yii::app()->createUrl('preferential/gift');?>">礼包套餐列表</a>
				
                <a class="btn <?php //echo $active[2]?>" href="<?php //echo Yii::app()->createUrl('preferential/create');?>">添加套餐</a>
                <a class="btn" href="<?php //echo Yii::app()->createUrl('remark/create');?>">备注</a>
				-->
				<!--
                <a class="btn" href="<?php //echo Yii::app()->createUrl('remark/giftcreate');?>">编辑礼包套餐备注信息</a>
				-->
               <!--
			    <a class="btn" href="<?php // echo Yii::app()->createUrl('buymeal/admin');?>">套餐购买情况</a>
                <a class="btn" href="<?php // echo Yii::app()->createUrl('buymeal/create');?>">添加购买信息</a>
				-->
			</div>
        </div>
    </div>
</div>