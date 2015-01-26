;ns.bit.util = {
    /**
    *   url是否带Get请求参数
    *@param url 网址
    */
    isHasParams : function(url){
        if(url.indexOf("?") != -1){
            return true;
        };
        return false;
    },
    /**
    *   url是否带#号参数
    *@param url 网址
    */
    isWithSpecailParams : function(url){
        if(url.indexOf("#") != -1){
            return true;
        };
        return false;
    },
    /**
    *   打开加载层
    */
    openLoading : function(msg){
        var id = "loading_" +　Math.floor(Math.random(10000000) * 10000000).toString();
        if(msg){
            var html = '<div id="'+ id +'" class="c_ajax_loading">' + msg +'</div>';
        }else{
            var html = '<div id="'+ id +'" class="c_ajax_loading">玩命加载中</div>';
        };
        $("body").append(html);
        var obj = $("#"+id);
        obj.show();
    },
    /**
    *   关闭加载层
    */
    closeLoading : function(){
        $(".c_ajax_loading").hide();
    }
};
butil = ns.bit.util;