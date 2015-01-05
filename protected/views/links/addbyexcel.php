<?php
/* @var $this SutuoController */
/* @var $model Sutuo */

$this->breadcrumbs=array(
	'友情链接管理'=>array('admin'),
	'Excel导入',
);

$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('validform',"
    seajs.use('$baseUrl/js/admin/validform.js',function(validform){
        validform.tiptype = 3;
    });
",CClientScript::POS_END); 

?>

<?php
    
    if(!empty($_FILES)){
        $name = $_FILES['sutuo']['name']['excel'];
        $tmp_name = $_FILES['sutuo']['tmp_name']['excel'];
        $type = $_FILES['sutuo']['type']['excel'];
        $size = $_FILES['sutuo']['size']['excel'];
        $error = $_FILES['sutuo']['error']['excel'];
		
        $file = new CUploadedFile($name,$tmp_name,$type,$size,$error);
        $extention = array(
            'xls','xlsx'
        );
		// var_dump($_FILES);
		if(!in_array($file->extensionName, $extention)){
            Yii::app()->user->setFlash('warning', '文件格式有误！');
        }else{
			
            $ds = DIRECTORY_SEPARATOR;
			
            Yii::registerAutoloader(array('YiiExcel', 'autoload'), true);
            $exclePath = $file->tempName;
			
//            $exclePath = Yii::getPathOfAlias('application.data') . $ds .'0.xls';
            $objPHPExcel = PHPExcel_IOFactory::load($exclePath);
			
            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
            $attribute = $model->attributeAddLabels();
            $attributes = array_keys($attribute);
			
            foreach($sheetData as $key=>$s){
                if($key=='1')   continue;
                $i = 0;
				foreach($s as $key_s=>$ss){
					if($i<2&&$ss!=''){
						$schedule[$key][$attributes[$i]] = $ss;
					}
                    $i++;
                }
               
            }
            echo "<div style='display:'>";
            var_dump($schedule);
            echo "</div>";
			// return;
            $fields = '';
            $count = count($schedule[2]);
            $i = 0;
             foreach($schedule[2] as $key=>$s){
                if($i==$count-1){
                    $fields .= $key;
                } else {
                    $fields .= $key.',';
                }
                $i++;
            }
            $allValue = '';

            $j = 0;
			$k = 2;
            foreach($schedule as $ss){
                $values = '';
                 $i = 0;
				 
                foreach($ss as $key=>$s){
                    
                    if(isset($ss['name'])){
						if($i==$count-1){
							$values .= "'".$s."'";
						} else {
							$values .= "'".$s."',";
						}
						$i++;
					}else{
						$k++;
					}
                }
				if($values!=''){
					$k = 1;
				}
				if($j==count($schedule)-$k)
					$allValue .= "($values)";
				else $allValue .= "($values),";
				$j++;
            }

			
            $querysql = "INSERT INTO g_links($fields) VALUES$allValue";
			
			// return;truncate table 表名
			Yii::app()->db->createCommand('truncate table g_links')->query();
            Yii::app()->db->createCommand($querysql)->query();
            $this->redirect('admin');
        }
       
    }
?>
<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'alerts'=>array( // configurations per alert type
        'warning'=>array('block'=>false, 'fade'=>true), // success, info, warning, error or danger
    ),
)); 

?>
<div class="alert in fade alert-info">
    <a class="close" data-dismiss="alert">×</a>
     每次只可上传<strong>一个</strong>Excel文件
</div>
<form class="form-horizontal j_Validform"  action="<?php echo Yii::app()->createUrl('links/addbyexcel');?>" method="post" enctype="multipart/form-data">
    <div class="control-group ">
        <label class="control-label" for="TestForm_textField" style="width:65px;">上传Excel</label>
        <div class="controls" style="margin-left: 80px;">
            <input name="sutuo[excel]" id="TestForm_textField" type="file" datatype="*"  nullmsg="请选择文件">
            <button class="btn btn-primary">提交</button>
        </div>
    </div>
</form>



