<!DOCTYPE HTML>

<html>

<head>
    
    <meta charset="utf-8">
    
    <meta name="format-detection" content="telephone=no" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="apple-mobile-web-app-capable" content="yes" />

    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    
    
    <title>签到壕礼送不停</title>
   
    
</head>

<body>
    <?php
        $auth=Yii::app()->authManager;
 
        // $auth->createOperation('createPost','create a post');
        // $auth->createOperation('readPost','read a post');
        // $auth->createOperation('updatePost','update a post');
        // $auth->createOperation('deletePost','delete a post');
    ?>
    
    <div>
        <div id="test" action="main/index">
            <div>test</div><!--不循环-->
            <div class="repeatHTML">
                <span>{nick}</span>
                <span>{name}</span>
            </div>
        </div> 
    </div>
    <div class="repeatHTML">
        <span>{nick}</span>
        <span>{name}</span>
    </div>
    <div class="repeatHTML">
        <span>{nick}</span>
        <span>{name}</span>
    </div>
    <div class="repeatHTML">
        <span>{nick}</span>
        <span>{name}</span>
    </div>
    <div class="repeatHTML">
        <span>{nick}</span>
        <span>{name}</span>
    </div>
    <div class="repeatHTML">
        <span>{nick}</span>
        <span>{name}</span>
    </div>
    <div class="repeatHTML">
        <span>{nick}</span>
        <span>{name}</span>
    </div>
    <div class="repeatHTML">
        <span>{nick}</span>
        <span>{name}</span>
    </div>
    <script src="/style/js/other/jquery/jquery.js"></script>
    <script src="/style/js/sea.js"></script>
    <script src="/style/js/n/nquery.js"></script>
    
    <script>
        var ns = {
            bit : function(arg){
                
                return new ns.bit.prototype.init(arg);
            }
        };
        ns.bit.prototype = {
            pageUrl : location.href,
            host : location.host,
            targetUrl : "",
            selector : "",
            init : function(arg){
                this.selector = $(arg);
                return this;
            },
            /**
            *   以当前的url为基础构建带参数的url
            *@params url参数数组
            */
            createUrl :  function(params){
                if(params == undefined) params = {};
                params = $.extend({data : "data"},params);
                if(this.util.isHasParams(this.pageUrl)){
                    this.targetUrl = this.pageUrl + "&" + $.param(params);
                }else{
                    this.targetUrl = this.pageUrl + "?" + $.param(params);
                }
            },
            get : function(params,fn,type){
                var _this = this;
                if(typeof params == "function"){
                    type = fn;
                    fn = params;
                    params = {};
                }
                this.createUrl(params);
                if(type == undefined || type == "ajax"){
                    $.get(this.targetUrl,function(obj){
                        if(typeof fn == "function") {
                            fn(obj,_this.selector);
                        }
                    },"json");
                }else{
                    seajs.use(this.targetUrl,function(obj){
                        if(typeof fn == "function") {
                            fn(obj.data,_this.selector);
                        }
                    });
                }                
                return this;
            },
            post : function(params,url){
                this.createUrl(params);
            }
        }
        ns.bit.prototype.util = {
            isHasParams : function(url){
                if(url.indexOf("?") != -1){
                    return true;
                }
                return false;
            }
        }
        ns.bit.prototype.init.prototype = ns.bit.prototype;
        var $$ = ns.bit;

        $$("#test").get(function(json,dom){
            // console.log(json);
            var time1 = new Date().getTime();
            dom.insertData(json);
            var time2 = new Date().getTime() 
            console.log(time2 - time1);
        },"ajax");

        
        
    </script>
    
    
    <script type="text/javascript">

    </script>

</body>

</html>