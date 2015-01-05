<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NActiveRecord
 *
 * @author Administrator
 */
class NFileActiveRecord extends NActiveRecord{
    //put your code here
    protected $uploadPath;
    public $imagesType = array(
        'image/jpeg',
        'image/gif',
        'image/png',
        'image/jpg',
    );
    
    
    public function save($runValidation = true, $attributes = null,$modelname=null) {
        
        $modelName = !empty($modelname)? $modelname: get_class($this);
        if(isset($_FILES[$modelName]['name'])){
            foreach($_FILES[$modelName]['name'] as $key=>$f){
                $rand  = date('YmdHis').rand(0, 10000);
                $tmp_name = $_FILES[$modelName]['tmp_name'][$key];
                $type = $_FILES[$modelName]['type'][$key];
                $size = $_FILES[$modelName]['size'][$key];
                $error = $_FILES[$modelName]['error'][$key];
                $file = new CUploadedFile($f,$tmp_name,$type,$size,$error);
                if(in_array($type, $this->imagesType)){
                    $filename = $key.$this->setFileName($file);
                    $dir = $this->mkdirPath('images');
                    $imagepath = $dir.DS.$filename;
                    $flag = $file->saveAs($imagepath,false);    
                }else{
                    $filename = $key.$this->setFileName($file);
                    $dir = $this->mkdirPath('files');
                    $filepath = $dir.DS.$filename;
                    $flag = $file->saveAs($filepath,true);
                }
                
                if($flag) $_POST[$modelName][$key] = $filename;
                $this->setAttributes($_POST[$modelName],false);
            }            
        }else{
            
        }
        return parent::save($runValidation, $attributes);
    }
    
    public function getFilePath($value,$type='files'){
        $modelName = get_class($this);
        $path = Yii::app()->baseUrl."/uploads/$modelName/$type";
        if(isset($value))
            $path = $path.'/'.$value;
        return $path;
    }
    
    public function setFileName($file){
        return $filename = trim(md5(time() . uniqid(rand(), true))) . '.' . $file->getExtensionName();
    }


    public function getUploadPath(){
        return $this->uploadPath = ROOT.DS.'uploads'.DS.get_class($this);
    }
    
    public function mkdirPath($type){
        $path = $this->getUploadPath().DS.$type;
        if (!is_dir($path)) {
            if (!mkdir($path,7777, true)) {
                throw new CHttpException(500, CJSON::encode(array('error' => Yii::t(
                    'Nan', '不能创建文件夹 "{dir}". 请确保可以写入。', array('{dir}' => $path)
                ))));
            }
        }
        return $path;
    }
}

?>
