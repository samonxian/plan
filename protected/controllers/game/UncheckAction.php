<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameAction
 *
 * @author Administrator
 */
class UncheckAction extends AdminAction{
    //put your code here
    public function run() {
//        $this->setCustomTags(array(
//           
//        ));

        $this->check(0,'examine');
    }
    
    public function check($examine,$operate,$show=true){
        NDataRender::$show_operation = $show;
        $condition = "`examine`=$examine";
        $modelName = ucfirst($this->controller->id);
        if(!empty($_POST[$modelName])) {
             $nsearchcondition = new NSearchConditon($this->controller);
             $s_condtion = $nsearchcondition->condition;
//             var_dump($s_condtion);
             if($s_condtion!='')
                $condition  = "$s_condtion and `examine`=$examine";
//             var_dump($condition);
        }
        $criteria=new CDbCriteria(array(  
            'condition'=>$condition,  
            'order'=>'`created` DESC',  
        )); 
        NDataRender::$dataProviderOptions = array(
            'criteria' => $criteria,
        );
        $dataRender = new NDataRender($this->controller,'uncheck',array(
            'show_checkbox_select'=>true,
            'operate'=>$operate,
        ));
    }
    
    public function tagTest(){
        return '000';
    }
    
}

?>
