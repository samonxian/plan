<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NSearch
 *
 * @author Administrator
 */
class NSearchByLetter extends CWidget{
    public $selector = 'yw0';
    public $target_filed = '';
    
    private $form_id;
    //put your code here
    public function init() {
        parent::init();
        $this->createForm();
        $this->registerScript();
    }
    
    protected function registerScript(){
        $baseUrl = Yii::app()->baseUrl;
        $url = Yii::app()->createUrl($this->controller->id . '/' .$this->controller->action->id);
        Yii::app()->clientScript->registerScript('letterSearch',"
            
        ",CClientScript::POS_END);
    }
    
    protected function createForm(){
        $path = Yii::getPathOfAlias('application.data.letter_list');
        $contents = file_get_contents($path . '.txt');
        $letters = explode(';', $contents);
        $form_name = ucfirst($this->controller->id) . "[$this->target_filed]";
        echo '<div class="btn-group mb10" data-toggle="buttons-radio">';
        foreach($letters as $key=>$l){
             $lower_l = strtolower($l);
             if($key==count($letters)-1) $lower_l = '0';
echo $c_btn=<<<EOD
            <a class="btn btn-small btn-primary" value="$lower_l" onclick="nformSearch.searchByLetter('$form_name',this);">$l</a>
EOD;
        
         }
            echo '</div>';
    }
}

?>
