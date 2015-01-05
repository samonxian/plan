<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NSearchConditon
 *
 * @author Administrator
 */
class NSearchConditon {
    //put your code here
    private $controller;
    private $modelName;
    public $condition = '';
    public function __construct($controller) {
        $this->controller = $controller;
        $this->modelName = ucfirst($this->controller->id);
        if(isset($_POST[$this->modelName]['ucfirst'])){
            $letter = $_POST[$this->modelName]['ucfirst'];
            $field = $_POST[$this->modelName][$letter];
            unset($_POST[$this->modelName][$letter]);
            unset($_POST[$this->modelName]['ucfirst']);
        }
//        var_dump($_POST);
        if($_POST[$this->modelName]['searchType']=='dim'){
            $this->unsetSearchType();
            $this->condition = $this->createCondition();
            if(isset($field)){
                unset($_POST);
                $_POST[$this->modelName][$letter] = $field;
                $leter_condition = $this->createAccurateCondition();
                if($this->condition!='')
                    $this->condition .= ' and '.$leter_condition;
                else $this->condition = $leter_condition;
            }
        } else{
            $this->unsetSearchType();
            $this->condition = $this->createAccurateCondition();
        }
        
    }
    
    public function unsetSearchType(){
        unset($_POST[$this->modelName]['searchType']);
    }
    
    public function createCondition(){
        $modelName = $this->modelName;
        $i = 0;
        $condition = '';
        $post_model = array_filter($_POST[$modelName]);
        $count = count($post_model);
        foreach($post_model as $key=>$p){
            $con1 = "t.`$key` like '%$p%'";
            if($i>=$count-1)
                $condition .= $con1;
            else $condition .= $con1 . ' and ';
            $i++;
        }
        return $condition;
    }
    public function createAccurateCondition(){
        $modelName = $this->modelName;
        $i = 0;
        $condition = '';
        $post_model = $_POST[$modelName];
//        $post_model = array_filter($_POST[$modelName]);
        $count = count($post_model);
        foreach($post_model as $key=>$p){
            $con1 = "t.`$key` = '$p'";
            if($i>=$count-1)
                $condition .= $con1;
            else $condition .= $con1 . ' and ';
            $i++;
            $key = $key;
        }
        return $condition;
    }
}

?>
