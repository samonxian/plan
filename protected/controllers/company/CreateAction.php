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
class CreateAction extends AdminAction{
    //put your code here
    public function run() {
        $this->setCustomTags(array(
            
        ),'<onlyone>');
        $this->controller->render('game');
    }
}

?>
