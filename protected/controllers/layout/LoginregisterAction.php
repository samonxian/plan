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
class LoginregisterAction extends TagsAction{
    public function __construct($controller, $id) {
        parent::__construct($controller, $id);
        $this->setCustomTags(array(
            
        ),'{$}');
    }
    //put your code here
}

?>
