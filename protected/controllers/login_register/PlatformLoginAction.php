<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlatformAction
 *
 * @author micheal
 */
class PlatformLoginAction extends LoginregisterAction{
    //put your code here
    public function run() {
       $this->controller->render('platformLogin');
    }
}

?>
