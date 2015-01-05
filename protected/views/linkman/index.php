<?php
/* @var $this LinkmanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Linkmen',
);

?>



<?php 
 $this->widget('ext.widgets.NSearchLinkman',array(
        'dataProvider'=>$options['dataProvider'],
    ));
    $this->widget('ext.widgets.NSearchByLetter',array(
        'target_filed'=>'initial',
    ));
	 $this->widget('ext.mylib.NGridView',$options); 
?>
