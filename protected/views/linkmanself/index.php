<?php
/* @var $this LinkmanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Linkmen',
);
?>
<?php
    $data = $this->platform;
    $options['dataProvider']->model->setChosen('p_id',$data);

//    $this->widget('ext.widgets.NSearchLinkman',array(
//        'dataProvider'=>$options['dataProvider'],
//    ));
?>

<?php 
    $this->widget('ext.mylib.NGridView',$options); 
?>
