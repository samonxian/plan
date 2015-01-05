<?php
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('validform',"
    seajs.use('$baseUrl/js/admin/validform.js');
",CClientScript::POS_END);

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
//    $options['columns'][3]['name'] = 'pwd';
//    $options['columns'][3]['header'] = '密码';
//    $options['columns'][2]['name'] = 'user';
//    $options['columns'][2]['header'] = '用户';  
    $temp = $options['columns'][4];
    $options['columns'][4] = array();
    $options['columns'][4]['name'] = 'user';
    $options['columns'][4]['header'] = '用户';  
    $options['columns'][5] = array();
    $options['columns'][5]['name'] = 'pwd';
    $options['columns'][5]['header'] = '密码';  
    $options['columns'][6] = $temp; 
//    $options['columns'][6] = $options['columns'][4];
    $this->widget('ext.mylib.NGridView',$options); 
?>
    
   