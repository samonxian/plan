<div class="nav relative">
 <?php $this->widget('bootstrap.widgets.TbTabs', array(
        'type'=>'tabs', // 'tabs' or 'pills'
        'tabs'=>array(
            array('label'=>'游戏管理', 'content'=>
//                                        CHtml::ajaxLink('添加游戏厂商',array('create'),array('update' => '#yw0')).
                '<a class="btn" href="'.Yii::app()->createUrl('pinfo/create').'" >添加游戏</a>
                <a class="btn" href="'.Yii::app()->createUrl('pinfo/uncheck').'">未审核游戏列表</a>
                <a class="btn" href="'.Yii::app()->createUrl('pinfo/isrejected').'">已拒绝游戏列表</a>
                <a class="btn" href="'.Yii::app()->createUrl('pinfo/ispassed').'">已通过游戏列表</a>
            ', 'active'=>true,'htmlOptions'=>array('class'=>'sdff')),
           
        ),
    )); 

?>
</div>