<?php
    $actions = array(
        'admin',
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
			<li class="active">
                <a href="<?php //echo Yii::app()->createUrl('buymeal/admin');?>">套餐购买情况管理</a>
            </li>
			-->
			<li class="active">
                <a href="<?php echo Yii::app()->createUrl('chargeself/admin');?>">充值与消费记录</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in">
				<a class="btn" href="<?php echo Yii::app()->createUrl('chargeself/admin');?>">充值记录</a>
				<a class="btn <?php echo $active[0]?>" href="<?php echo Yii::app()->createUrl('buymealself/admin');?>">套餐消费记录</a>
			</div>
        </div>
    </div>
</div>