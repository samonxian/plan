<?php



/**
 * 用来处理标签替换,只能再...Action（继承TagsAction）的类中能用，
 *
 * @author Administrator
 */
class NDataAction extends CWidget{
    /**
     * 不循环插入自定义数据
     * @param array $t 传入的替换数组
     */
    public function insertCustomDatasByTags($t){
         $tag = $this->tagId;
         $m = $this->getTagContents($tag);
         if(!empty($m)){
             $html = Yii::t('nan',$m[0],$t);
         }
         return $html;
    }
    /**
     * 不循环单条数据
     * @param array $id 主键值
     */
    public function insertDatasByTagsPK($id,$options=array()){
        $tag = $this->tagId;
        $m = $this->getTagContents('info');
        if(isset($m[0])){
            $model = Platform::model()->findByPk($_GET['id']);
            $showColumns = $model->attributeStageLabels();
            $labels = array_keys( $model->attributeLabels());
            if(isset($options['all']))
                $showColumns = array_merge($showColumns,$labels);
            $t=array();
             //处理tagData方法
            $function = $tag.'Data';
            
            if(method_exists($this,$function))  
                /**
                 * @param $d model对象
                 */
                $t = $this->$function($model,$t);
            foreach($showColumns as $s){
                $t['$'.$s] = $model[$s]; 
            }
            $html = Yii::t('nan',$m[0],$t);
            return $html;
        }
    }
    public function debugMemCache(){
        
    }
     /**
     *  循环替换标签插入memcache数据,格式{表签名+Data}类方法
     *@param array $options 
     *@param array $memcahe_id 设置memcache额外id后缀
     *@param string $noData提示语
     *  $options['model']Model名<br/>
     *  $options['dataProvider']CActiveDataProvider参数配置<br/>
     *  $options['all']定义后，attributeLabel方法中定义的所有字段都会开启
     */
    public function insertMemcacheDataByTags($options,$memcahe_id='',$noData='没找到数据！'){
        $tag = $this->tagId;
        $m = $this->getTagContents($tag);
        if(!empty($m)){
            if(!isset($options['dataProviderOptions']))
                $options['dataProviderOptions'] = array();
            
            $memcache_id = $this->controller->action->id.$tag.$memcahe_id;
//            echo $memcache_id."<br>";
            // if(Yii::app()->memcache->openMemCache){
            if(false){
//                Yii::app()->memcache->flush();
                $data = Yii::app()->memcache->get($memcache_id);
                if(!$data){
                    $dataProvider = new CActiveDataProvider($options['model'],$options['dataProviderOptions']);
                    $data = $dataProvider->getData();
                    if(isset($options['memcache_lifetime']))
                        $time = $options['memcache_lifetime'];
                    else $time = NMemCache::$time_day;
                    Yii::app()->memcache->set($memcache_id,$data,$time);
                }
                
            }else{
                $dataProvider = new CActiveDataProvider($options['model'],$options['dataProviderOptions']);
                $data = $dataProvider->getData();
            }
			
            if(!isset($data[0])){
                $showColumns = array();
                $labels = array();
            }else{
                $showColumns = $data[0]->attributeStageLabels();
                $labels = array_keys($data[0]->attributeLabels());
            }
            if(isset($options['all']))
                $showColumns = array_merge($showColumns,$labels);
           //  var_dump($showColumns);
            $html = '';
            $t=array();
             //处理tagData方法
            $flag = false;
            $function = $tag.'Data';
            if(method_exists($this,$function)) {
                $flag = true;
            } 
            foreach($data as $key=>$d){
                if($flag)  
                    /**
                     * @param $d model对象
                     */
                    $t = $this->$function($d,$t);
                foreach($showColumns as $s){
                    $t['$'.$s] = $d[$s]; 
                }
                $html .= Yii::t('nan',$m[0],$t);
            }
            //处理pager
            $this->setCustomTags(array(
                $this->tagId.'Pager',
            ),$this->tagType[$this->tagId]);     
            $function =  $this->tagId.'Pager';
            if(method_exists($this,$function)){
                $pager = $this->$function($dataProvider->pagination);
                $this->replaceByTag($this->tags[$function],$pager);
            }
            if($html==''&&$noData!='') $html = '<h1 class=" noResult">'.$noData.'</h1>';
            elseif($html==''&&$noData=='') $html = '<h1 style="display:none;;">'.$noData.'</h1>';
            return $html;
        }
    }
    /**
     *  循环替换标签插入数据,格式{表签名+Data}类方法
     *@param array $options 
     *@param string $noData提示语
     *  $options['model']Model名<br/>
     *  $options['dataProvider']CActiveDataProvider参数配置<br/>
     *  $options['all']定义后，attributeLabel方法中定义的所有字段都会开启
     */
    public function insertDatasByTags($options,$noData='没找到数据！'){
        $tag = $this->tagId;
        $m = $this->getTagContents($tag);
        if(!empty($m)){
            if(!isset($options['dataProviderOptions']))
                $options['dataProviderOptions'] = array();
            $dataProvider = new CActiveDataProvider($options['model'],$options['dataProviderOptions']);
            $data = $dataProvider->getData();
            $showColumns = $dataProvider->model->attributeStageLabels();
            $labels = array_keys( $dataProvider->model->attributeLabels());
            if(isset($options['all']))
                $showColumns = array_merge($showColumns,$labels);
//             var_dump($showColumns);
            $html = '';
            $t=array();
             //处理tagData方法
            $flag = false;
            $function = $tag.'Data';
            if(method_exists($this,$function)) {
                $flag = true;
            } 
            foreach($data as $key=>$d){
                if($flag)  
                    /**
                     * @param $d model对象
                     */
                    $t = $this->$function($d,$t);
                foreach($showColumns as $s){
                    $t['$'.$s] = $d[$s]; 
                }
                $html .= Yii::t('nan',$m[0],$t);
            }
            //处理pager
            $this->setCustomTags(array(
                $this->tagId.'Pager',
            ),$this->tagType[$this->tagId]);     
            $function =  $this->tagId.'Pager';
            if(method_exists($this,$function)){
                $pager = $this->$function($dataProvider->pagination);
                $this->replaceByTag($this->tags[$function],$pager);
            }
            if($html==''&&$noData!='') $html = '<h1 style="font-size:15px;padding:15px;margin-left:15px;color:red;">'.$noData.'</h1>';
            elseif($html==''&&$noData=='') $html = '<h1 style="display:none;;">'.$noData.'</h1>';
            return $html;
        }
    }
}

?>
