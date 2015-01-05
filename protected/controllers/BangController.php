<?php
class BangController extends NController{
    
        public $layout = '//layouts/stage_default';
        public function actions(){
                // return external action classes, e.g.:
                return array(

                        'index'=>'application.controllers.stage.RankAction',

                );
        }
        	
}