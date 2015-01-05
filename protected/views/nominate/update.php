<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'Sservices'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>


<?php 
    // $game = $this->getGame();
    // $data = array();
    // foreach($game as $g){
        // $data[$g->game->id] = $g->game->name;
    // }
    // $model->setChosen('name',$data);
    echo $this->renderPartial('_uform', array('model'=>$model));
?>