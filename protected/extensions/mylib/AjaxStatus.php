<?php
/**
 *	
 */

class AjaxStatus {
    public function set($status){
    	switch($status){
            case AjaxStatus::SUCCESS:                
                $this->layout = "";
                $other = array(
                    "ret"=>AjaxStatus::SUCCESS,
                    "msg"=>"success",                    
                );
                if(isset($_GET["create"])){
                    $other["path"] = Yii::getPathOfAlias('application.views.'.$this->id.".".$this->action->id."_temp").".php";
                }                
            break;
            case AjaxStatus::PATH_NOT_SET:                
                $this->layout = "";
                $other = array(
                    "ret"=>AjaxStatus::PATH_NOT_SET,
                    "msg"=>"The path to save is not set.",                    
                );            
            break;            
        }
        $data = array_merge($this->ajaxData,$other);
        echo json_encode($data);
    }
    /**
	*	请求成功
    */
    const SUCCESS = 0;
    /**
    *   存储路径未设置，即$_POST["path"]不存在
    */
    const PATH_NOT_SET = 10001;

}

