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
        });
    },
    /**
    *   导航 用来生成PHP代码,自动执行
    */
    nav : function(){
        this.createBtnId = this.createBtnId + Math.floor(Math.random(10000)*10000000);
        this.navId = this.navId + Math.floor(Math.random(10000)*10000000);
        var html = '<div class="navbar navbar-inverse navbar-fixed-top '+ this.navId +'">';
        html += '<div class="navbar-inner">';
        html += '<a class="brand" href="javascript:void(0);">生成对应PHP</a>';
        html += '<a id="'+this.createBtnId+'" class="btn btn-primary " href="javascript:void(0);" style="float:right;">生成</a>';
        html += '</div>';  
        html += '</div>';
        $("body").before(html);        
    },
    /**
    *   格式化最终HTML格式
    */
    styleHtml : function(){
        this.temp_html.find("." + this.navId).remove();
        var html = "<!DOCTYPE html>\n";
        html += "<html>\n";
        html += this.temp_html.html();
        html += "\n</html>";
        console.log(html);
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
        var convertHtml = temp_html.find(dom_id).find(".repeatHTML").html();
        var php = "\n<?php \n";
        var result = convertHtml.replace(/\{\$([^}]+)\}/ig, function(){
            field_name = arguments[1];    
            return "<?php echo $d['"+field_name+"'];?>";
        });        
        php += "    foreach($data['"+temp_html.find(dom_id).attr("id")+"'] as $d){ ?>";
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
        var data = {};
        data.html = this.styleHtml();   
        ns.bit.http.post("/site/savetophp",data,function(json){
            
        });     
    }
}
bphp = ns.bit.tophp;
//初始化
bphp.init();