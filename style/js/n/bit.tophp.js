ns.bit.tophp = {
    createBtnId : "j_create",
    navId : "j_temp",
    temp_html : "",
    listViewDoms : {}, 
    /**
    *   初始化
    */
    init : function(){
        var _this = this;
        this.nav();     
        $("#"+this.createBtnId).click(function(){    
            _this.save(); 
            _this.temp_html = "";
        });
    },
    /**
    *   导航 用来生成PHP代码,自动执行
    */
    nav : function(){
        this.createBtnId = this.createBtnId + Math.floor(Math.random(10000)*10000000);
        this.navId = this.navId + Math.floor(Math.random(10000)*10000000);
        var html = '<nav class="navbar navbar-default '+ this.navId +'">';
        html += '<div class="container-fluid">';
        html += '<a class="navbar-brand" href="javascript:void(0);">生成对应PHP</a>';
        html += '<ul class="nav navbar-nav navbar-right"><li>';
        html += '<a id="'+this.createBtnId+'" class="btn btn-default" href="javascript:void(0);" style="float:right;">生成</a>';
        html += '</li></ul></div>';  
        html += '</nav>';
        $("body").before(html);        
    },
    /**
    *   格式化最终HTML格式
    */
    styleHtml : function(){
        this.temp_html.find("." + this.navId).remove();
        this.temp_html.find(".create_php_for_remove").remove();
        var html = "<!DOCTYPE html>\n";
        html += "<html>\n";
        html += this.temp_html.html();
        html += "\n</html>";
        // console.log(html);
        return html;
    },
    /**
    *   ajax转PHP ListView
    *@param dom_id jquery选择器id或class 
    */
    convertToListView : function(dom_id){
        if(this.temp_html==""){
            var temp_html = $("html").clone();
            this.temp_html = temp_html;
        }else{
            var temp_html = this.temp_html;
        }        
        var convertDom = temp_html.find(dom_id).find(".repeatHTML");
        var convertDomClone = convertDom.clone();
        convertDomClone.removeClass("repeatHTML");
        convertDomClone.show();
        var convertHtml = convertDomClone.outerHtml();
        var php = "\n<?php \n";
        var result = convertHtml.replace(/\{\$([^}]+)\}/ig, function(){
            field_name = arguments[1];    
            return "<?php echo $d['"+field_name+"'];?>";
        });        
        php += "    foreach($data['"+temp_html.find(dom_id).attr("id")+"']['data'] as $d){ ?>";
        php += result + "\n";
        php += "<?php \n    }\n?>\n";
        if(ns.bit.debug){  
            console.debug(php);
        }
        convertDom.parent().html(php);
    },
    save : function(){
        if(ns.bit.debug){
            console.debug("ListView------------------------");
        }
        for(var list in this.listViewDoms){
            if(ns.bit.debug){            
                console.debug("ListView:"+list);
            }
            this.convertToListView(list);
        }
        if(ns.bit.debug){            
            console.debug("------------------------ListView");
        }
        var data = {path : ns.bit.path};
        data.html = this.styleHtml();   
        ns.bit.http.post("/site/savetophp",data,function(json){
            bMsg.alert(json.msg);
        },"json");     
    }
}
//初始化
ns.bit.tophp.init();
bPhp = ns.bit.tophp;
