<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'开服列表'=>array('admin'),
	'创建开服',
);
?>

<?php
     $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>false, 'fade'=>true), // success, info, warning, error or danger
        ),
     ));
     $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array( // configurations per alert type
            'error'=>array('block'=>false, 'fade'=>true), // success, info, warning, error or danger
        ),
    ));
     
    //$model->setChosen('name',$data);
    if($gameExist){
        switch($gameExist){
                case 1:
                        $message = array("type"=>"error","content"=> "该开服信息已经存在！");
                        break;
                case 2:
                        $message = array("type"=>"success","content"=> "开服成功！");
                        break;
                default:
                        $message = array("type"=>"success","content"=> "操作成功！");
                        break;
        }
       

//        $this->widget('ext.toastMessage.toastMessageWidget',array(
//            'message'=>$message["content"],
//            'type'=>$message["type"],
//            'options'=>array(
//                'position'=>'middle-center',
//                'sticky'=>true,
//            )
//        ));
    }
    echo $this->renderPartial('_form', array('model'=>$model)); 
 ?>