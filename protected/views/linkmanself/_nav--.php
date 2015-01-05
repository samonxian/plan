<div class="nav relative">
 <?php $this->widget('bootstrap.widgets.TbTabs', array(
        'type'=>'tabs', // 'tabs' or 'pills'
        'tabs'=>array(
            array('label'=>'公司审核管理', 'content'=>
//                                        CHtml::ajaxLink('添加游戏厂商',array('create'),array('update' => '#yw0')).
                '<a class="btn" href="'.Yii::app()->createUrl('company/create').'" >添加游戏厂商</a>
                <a class="btn" href="'.Yii::app()->createUrl('company/uncheck').'">未审核公司列表</a>
                <a class="btn" href="'.Yii::app()->createUrl('company/isrejected').'">已拒绝公司列表</a>
                <a class="btn" href="'.Yii::app()->createUrl('company/ispassed').'">已通过公司列表</a>
            ','htmlOptions'=>array('class'=>'sdff')),
            array('label'=>'平台审核管理', 'content'=>'
                <a class="btn" href="'.Yii::app()->createUrl('platformself/create').'" >添加游戏平台</a>
                <a class="btn" href="'.Yii::app()->createUrl('platformself/uncheck').'">未审核平台列表</a>
                <a class="btn" href="'.Yii::app()->createUrl('platformself/isrejected').'">已拒绝平台列表</a>
                <a class="btn" href="'.Yii::app()->createUrl('platformself/ispassed').'">已通过平台列表</a>
            ',),
            array('label'=>' 平台联系人审核管理', 'content'=>'
                <a class="btn" href="'.Yii::app()->createUrl('linkmanself/create').'" >添加平台联系人</a>
                <a class="btn" href="'.Yii::app()->createUrl('linkmanself').'" >平台联系人列表</a>
            ','active'=>true),
            array('label'=>'其他', 'items'=>array(
                array('label'=>'@fat', 'content'=>'士大夫'),
                array('label'=>'@mdo', 'content'=>'sf '),
            )),
        ),
    )); 

?>
</div>