<?php
/**
 * TbDataColumn class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 */


/**
 * Bootstrap grid data column.
 */ 
class NDataColumn extends TbDataColumn{
        protected function renderHeaderCellContent() {
            if($this->name=='checkbox') {
                $modelName = $this->grid->dataProvider->id;
                $target_id = $this->grid->target_id;
                $action_id = Yii::app()->controller->action->id;
                $baseUrl =  Yii::app()->baseUrl;
                $url = Yii::app()->createUrl("/$modelName/operate");
                Yii::app()->clientScript->registerScript('','
                       var ncheckbox;
                       seajs.use("'.$baseUrl.'/js/admin/article_system/GridViewCheckbox.js",function(){
                             ncheckbox = GridViewCheckbox("#'.$target_id.'","'.$url.'");
                             ncheckbox.send.actionId = "'.$action_id.'";
                       });
                    '
                    ,CClientScript::POS_END
                );
            }
            parent::renderHeaderCellContent();
        }
	protected function renderDataCellContent($row,$data){
//                if($this->value = 'checkbox') echo "sdf";
                $chosen = $data->chosen();
		if($this->value!==null) 
			$value=$this->evaluateExpression($this->value,array('data'=>$data,'row'=>$row));
		elseif($this->name!==null){
                    switch($this->name){
                        case 'checkbox':
                             $modelName = get_class($data);
                             echo CHtml::checkBox ($modelName."[id]",false,array('class'=>'grid_checkbox'));
                        break;
                    }
                    
                    $value=CHtml::value($data,$this->name);
                    $fileType = $this->grid->dataProvider->model->fieldType();
                    

               }
               if(isset($fileType[$this->name]))
                    switch($fileType[$this->name]){
                        case 'url':
                             echo $value = CHtml::link ($value,$value,array(
                                 'target'=>'_blank',
                             ));
                             $value = '';
                        break;
                        case 'image':
                             $imagechosen = $chosen[$this->name];
                             $src = $data->getFilePath($value,'images');
                             $width = $imagechosen['width'] / $imagechosen['scale'];
                             $height = $imagechosen['height'] / $imagechosen['scale'];
                             echo "<div style='width:{$width}px;height:{$height}px;overflow:hidden;'>";
                             echo $value = CHtml::image ($src,'',array(
                                 'class'=>'fl',
                             ));
                             echo "</div>";
                             $value = '';
                        break;
                        
                    }  
		echo $value===null ? $this->grid->nullDisplay : $this->grid->getFormatter()->format($value,$this->type);
                
	}
}
