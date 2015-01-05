<?php
/* @var $this SserviceController */
/* @var $model Sservice */

$this->breadcrumbs=array(
	'开服列表'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'修改',
);
?>


<?php 
    // $game = $this->getGame();
    // $data = array();
    // foreach($game as $g){
        // $data[$g->game->id] = $g->game->name;
    // }
    // $model->setChosen('name',$data);
    $model->nomi_font = str_replace('0-1-2-3-4-5-6-7-8-9-10-11-12-13-14-15-16-17-18-19-20-21-22-23', '全天', $model->nomi_font);
    $model->nomi_font = str_replace('0-1-2-3-4-5-6-7-23', '通宵', $model->nomi_font);
    echo $this->renderPartial('_form2', array(
        'model'=>$model,
    ));
?>