<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'开服列表'=>array('admin'),
	'创建开服',
);
?>

<?php
    
    //$model->setChosen('name',$data);
    if($gameExist){
		switch($gameExist){
			case 1:
				$message = array("type"=>"error","content"=> "不能重复推荐！");
				break;
			case 2:
				$message = array("type"=>"success","content"=> "推荐成功！");
				break;
			default:
				$message = array("type"=>"success","content"=> "操作成功！");
				break;
		}
        $this->widget('ext.toastMessage.toastMessageWidget',array(
            'message'=>$message["content"],
            'type'=>$message["type"],
            'options'=>array(
                'position'=>'middle-center',
                'sticky'=>true,
            )
        ));
    }
    echo $this->renderPartial('_form', array('model'=>$model)); 
 ?>