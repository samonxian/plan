#WDjQuerycity for Yii extensions 

---

// description

基于seajs的城市三级联动,依赖select组件 

---

## 使用说明

    
    <?php $this->Widget('ext.WDjQuerycity.WDjQuerycity', array(
        'model'  => $model,
        'province' =>'province',  //数据库字段province
        'city' =>'city',  //数据库字段city
        'area' =>'area',  //数据库字段area 
        'provinceValue'=>$model->province,  // province 默认值
        'cityValue' =>$model->city,  // city默认值
        'areaValue'=>$model->area,  // area默认值
           // 'provinceOptions' => array(), // province Html Options
           // 'cityOptions' => array(), // city Html Options
           // 'areaOptions' => array() // area Html Options
    )); ?>

