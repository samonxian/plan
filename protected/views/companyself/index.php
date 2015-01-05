<?php
$this->breadcrumbs=array(
    '公司管理',
);

?>

<?php
    $this->widget('ext.widgets.NSearch',array(
        'dataProvider'=>$options['dataProvider'],
    ));
    $this->widget('ext.widgets.NSearchByLetter',array(
        'target_filed'=>'initial',
    ));
?>
<?php
    $this->widget('ext.mylib.NGridView',$options); 
?>