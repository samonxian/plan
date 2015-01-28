;ns.bit.http = {
    /**
    *   当前url
    */
    pageUrl : location.href,
    /**
    *   域名host
    */
    host : location.host,
    /**
    *   请求的目标Url
    */
    targetUrl : "",
    selector : "",    
    /**
    *   以当前的url为基础构建带参数的url
    *@param url参数数组
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
    /**
    *   ajax get请求
    *@param [string|objcet] params url参数（可不填）
    *@param [function] fn 请求成功回调函数（必填）
    *   json [object] 返回的json对象
    *   obj [object] ns.bit.http对象
    *@param [string] type 请求返还类型（json,html,script等跟jquery ajax一样）（必填）
    *@param [int] timeout 请求超时时间
    */
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
                if(json.path != undefined) {
                    ns.bit.path = json.path;
                }
                if(json.targetUrl != undefined) {
                    ns.bit.targetUrl = json.targetUrl;
                }
                if(json.saveUrl != undefined) {
                    ns.bit.saveUrl = json.saveUrl;
                }
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
                    },2000);
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
    /**
    *   ajax post请求
    *@param [string|objcet] params url参数（可不填）
    *@param [object] data 提交的表单数据（可不填）
    *@param [function] fn 请求成功回调函数（必填）
    *   json [object] 返回的json对象
    *   obj [object] ns.bit.http对象
    *@param [string] type 请求返还类型（json,html,script等跟jquery ajax一样）（必填）
    *@param [int] timeout 请求超时时间 
    */
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
                if(json.path != undefined) {
                    ns.bit.path = json.path;
                }
                if(json.targetUrl != undefined) {
                    ns.bit.targetUrl = json.targetUrl;
                }
                if(json.saveUrl != undefined) {
                    ns.bit.saveUrl = json.saveUrl;
                }
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
                    },2000);
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
bHttp = ns.bit.http;