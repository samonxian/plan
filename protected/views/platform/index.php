<?php
/* @var $this PlatformController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Platforms',
);

?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
