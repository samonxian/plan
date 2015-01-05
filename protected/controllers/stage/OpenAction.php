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
class OpenAction extends StageAction{
    //put your code here
    public function run() {
        $this->controller->render('open');
    }
    public function tagLnav(){
        $t=array(
            '$nav_num'=>'1',
        );
        return NDataAction::insertCustomDatasByTags($t);
    }
}

?>
