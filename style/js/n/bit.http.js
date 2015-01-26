;ns.bit.http = {
    pageUrl : location.href,
    host : location.host,
    targetUrl : "",
    selector : "",    
    /**
    *   以当前的url为基础构建带参数的url
    *@params url参数数组
    */
    createUrl :  function(params){
        if(params == undefined) params = {};
        params = $.extend({ajax : "data"},params);
        //url带#号
        if(ns.bit.util.isWithSpecailParams(this.pageUrl)){
            //url带?号
            if(ns.bit.util.isHasParams(this.pageUrl)){
                this.targetUrl = this.pageUrl.replace("#","&" + $.param(params)+"#");
            }else{
                this.targetUrl = this.pageUrl.replace("#","?" + $.param(params)+"#");
            }            
        }else{
            if(ns.bit.util.isHasParams(this.pageUrl)){
                this.targetUrl = this.pageUrl + "&" + $.param(params);
            }else{
                this.targetUrl = this.pageUrl + "?" + $.param(params);
            }
        }
    },
    get : function(params,fn,type,timeout){
        var _this = this;
        if(typeof params == "function"){
            timeout = type;
            type = fn;
            fn = params;
            params = {};
            _this.createUrl(params);
        }else if(typeof params == "string"){
            _this.targetUrl = params;
        }else{
            _this.createUrl(params);
        };               
        if(type == undefined ){
            type == "json";                    
        };
        if(timeout == undefined ){
            timeout == 5000;                    
        };
        var ajax = {
            type : 'get',
            dataType : type,
            timeout : timeout,
            url : _this.targetUrl,
            success : function(json){
                if(typeof fn == "function") {
                    fn(json,_this);
                };
                if(ns.bit.debug){
                    _this.endTime = new Date().getTime();
                    var time = _this.endTime - _this.startTime;
                    ns.bit.util.openLoading(_this.selector.selector + ":耗时" + time + "毫秒");
                    console.log(_this.selector.selector + ":耗时" + time + "毫秒");
                    var clear =  setTimeout(function() {
                        ns.bit.util.closeLoading();
                        clearTimeout(clear);
                    },4000);
                    console.timeEnd(_this.selector.selector);
                }else{
                    ns.bit.util.closeLoading();
                };                
            },
            beforeSend : function(){
                if(ns.bit.debug){
                    console.time(_this.selector.selector);
                    _this.startTime = new Date().getTime();
                };
                ns.bit.util.openLoading();
            }
        };
        $.ajax(ajax);
        return this;
    },
    post : function(params,data,fn,type,timeout){
        var _this = this;
        if(typeof data == "function"){
            timeout = type;
            type = fn;
            fn = data;
            data = params;
            params = {};
            this.createUrl(params);
        }else if(typeof params == "function"){
            timeout = fn;
            type = data;
            fn = params;
            data = {};
            params = {};
            this.createUrl(params);
        }else if(typeof params == "string"){
            _this.targetUrl = params;
        }else{
            _this.createUrl(params);
        };  
        if(type == undefined ){
            type == "json";                    
        };
        if(timeout == undefined ){
            timeout == 5000;                    
        };
        var ajax = {
            type : 'post',
            data : data,
            dataType : type,
            timeout : timeout,
            url : _this.targetUrl,
            success : function(json){
                if(typeof fn == "function") {
                    fn(json,_this);
                };
                if(ns.bit.debug){
                    _this.endTime = new Date().getTime();
                    var time = _this.endTime - _this.startTime;
                    ns.bit.util.openLoading(_this.selector.selector + ":耗时" + time + "毫秒");
                    console.log(_this.selector.selector + ":耗时" + time + "毫秒");
                    var clear =  setTimeout(function() {
                        ns.bit.util.closeLoading();
                        clearTimeout(clear);
                    },4000);
                    console.timeEnd(_this.selector.selector);
                }else{
                    ns.bit.util.closeLoading();
                };                
            },
            beforeSend : function(){
                if(ns.bit.debug){                    
                    console.time(_this.selector.selector);
                    _this.startTime = new Date().getTime();
                };
                ns.bit.util.openLoading();
            }
        };
        $.ajax(ajax);
        return this;
    }
};
bhttp = ns.bit.http;