# jQuerycity

---

// description

基于seajs的城市三级联动,依赖select组件

---

## 使用说明

   **default** : 设置默认显示的省、市、区<br>
   **selectId**: 对应下拉框的dom元素id<br>

## API

    $(function(){
        $("body").jQueryCity({
            default : {
                province : "浙江省" ,
                city : "杭州市" ,
                area : "西湖区"
            },
            selectId : {
                province : "province",
                city     : "city" ,
                area     : "area"
              }
        })
    })

