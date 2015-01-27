<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NController
 *
 * @author Administrator
 */
class NController extends Controller{
        
        public function renderWithTags($view, $data = null, $return = false) {
            if($this->beforeRender($view)){
                    $output=$this->renderPartial($view,$data,true);
                    if(($layoutFile=$this->getLayoutFile($this->layout))!==false)
                            $output=$this->renderFile($layoutFile,array('content'=>$output),true);

                    $this->afterRender($view,$output);
                    
                    $output = $this->action->runTags($output);//我的修改
                    $output=$this->processOutput($output);

                    if($return)
                            return $output;
                    else
                            echo $output;
            }
            
        }
        public function render($view, $data = null, $return = false) {
            if($this->beforeRender($view)){
                    $output=$this->renderPartial($view,$data,true);
                    if(($layoutFile=$this->getLayoutFile($this->layout))!==false)
                            $output=$this->renderFile($layoutFile,array('content'=>$output),true);

                    $this->afterRender($view,$output);
                    if(method_exists($this->action,"runTags"))
                        $output = $this->action->runTags($output);//我的修改
                    $output=$this->processOutput($output);

                    if($return)
                            return $output;
                    else
                            echo $output;
            }
            
        }
        protected function redirectUser($id){
                if (isset($_POST['_save'])) {
                        Yii::app()->user->setFlash('success',Yii::t('Nan','保存成功！ 以下为您保存的信息！'));
                        $this->redirect(array('view','id'=>$id));
                } else if (isset($_POST['_addanother'])) {
                        Yii::app()->user->setFlash('success',Yii::t('Nan','保存成功！ 您可以继续添加另一个。'));
                        $this->redirect(array('create'));
                } else if (isset($_POST['_continue'])) {
                        Yii::app()->user->setFlash('success',Yii::t('Nan','保存成功！ 您可以进一步修改。'));
                        $this->redirect(array('update','id'=>$id));
                }
        }
        public function myredirect($view,$params=array()){
            $url = $this->id . '/' .$view;
            $this->redirect(Yii::app()->createUrl($url,$params));
        } 
        public $ajaxData = array();       
        /**
        *   保存ajax生成的PHP文件
        */
        public function actionSaveToPhp(){
            $this->layout = "";
            if($_POST["path"] != ""){
                $this->ajaxData["path"] = $_POST["path"];
                $contents = str_replace("<!--?php","<?php", $_POST["html"]);
                $contents = str_replace("?-->", "?>", $contents);
                $flag = file_put_contents($_POST["path"], $contents);
                if($flag){
                    AjaxStatus::set(AjaxStatus::SUCCESS);
                }
            }else{
                AjaxStatus::set(AjaxStatus::PATH_NOT_SET);
            }
        }
        
        
}

?>
