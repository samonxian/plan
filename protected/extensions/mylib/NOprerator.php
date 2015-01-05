<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 批量操作
 *
 * @author Administrator
 */
class NOprerator {
    //put your code here
    private $controller;
    private $tableName;
    public function __construct($controller) {
//        var_dump($_POST);
//        return;
        if(!isset($_POST['ntype'])) exit();
        $this->controller = $controller;
        $this->tableName = ucfirst($this->controller->id);
        $redirect = $_POST['actionId'];
        $this->$_POST['ntype']($redirect);
    }
    public function examine($redirect){
       
        foreach($_POST["ids"] as $d){
            $model = $this->controller->loadModel($d);
            
            $_POST[$this->tableName]['examine'] = $_POST['examine'];
//            $model->attributes = $_POST[$this->tableName];
            $model->setAttributes($_POST[$this->tableName], false);
//             var_dump($model->attributes);
            $model->saveAttributes($model->attributes);
//            return;
        }
        
//        return;
        $this->controller->redirect($redirect);
    }
    
    public function delete($redirect){
        foreach($_POST["ids"] as $d){
            $model = $this->controller->loadModel($d);
            $model->delete();
        }
        $this->controller->redirect($redirect);
    }
}

?>
