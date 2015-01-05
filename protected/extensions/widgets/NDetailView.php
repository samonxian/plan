<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NDetailView
 *
 * @author Administrator
 */
Yii::import('zii.widgets.CDetailView');
class NDetailView extends CDetailView{
    //put your code here
    protected $fieldType;
    protected $chosen;
    public function init() {
        parent::init();
        $this->fieldType = $this->data->fieldType();
        $this->chosen = $this->data->chosen();
    }
    protected function renderItem($options, $templateData) {
        //var_dump($templateData);
        if($this->fieldType[$options['name']]=='image') {
             $temptag = '';
             $imagechosen = $this->chosen[$options['name']];
             $src = $this->data->getFilePath($templateData['{value}'],'images');
             $width = $imagechosen['width'];
             $height = $imagechosen['height'];
             $temptag .= "<div style='width:{$width}px;height:{$height}px;overflow:hidden;'>";
             $temptag .= $value = CHtml::image ($src,'',array(
                 'class'=>'fl',
//                 'style'=>"width:{$imagechosen['width']};height:{$imagechosen['height']};",
             ));
             $temptag .= "</div>";
            $templateData['{value}'] = $temptag;
        }
        if($this->fieldType[$options['name']]=='chosen') {
             $chosen = $this->chosen[$options['name']];
             $templateData['{value}'] = $chosen[$templateData['{value}']];
        }
        if($this->fieldType[$options['name']]=='chosenMultiple') {
             $chosen = $this->chosen[$options['name']];
             $child = explode(',', $templateData['{value}']);
             $templateData['{value}'] = '';
             foreach($child as $c){
                $templateData['{value}'] .= $chosen[$c].'--';
             }
             $templateData['{value}'] = rtrim($templateData['{value}'], "--");
        }
        parent::renderItem($options, $templateData);
    }
}

?>
