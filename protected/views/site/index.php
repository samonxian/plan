<!DOCTYPE HTML>

<html>

<head>
    
    <meta charset="utf-8">
    
    <meta name="format-detection" content="telephone=no" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="apple-mobile-web-app-capable" content="yes" />

    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="stylesheet" href="/style/css/bootstrap/bootstrap.css"/>
    
    <title>签到壕礼送不停</title>
    <style>
        .c_ajax_loading {
            position: fixed;
            text-align: center;
            top: 30%;
            left: 50%;
            padding:10px;
            z-index: 1050000;
            min-width:80px;
            margin-left: -40px;
            background-color: #ddd;
            border: 1px solid #999;
            border-radius: 6px;
            display: none;
        }
    </style>
    
</head>

<body>
    <?php
        $auth=Yii::app()->authManager;
        
        // $auth->createOperation('createPost','create a post');
        // $auth->createOperation('readPost','read a post');
        // $auth->createOperation('updatePost','update a post');
        // $auth->createOperation('deletePost','delete a post');
    ?>
    <a href="#myModal" role="button" class="btn" data-toggle="modal">查看演示案例</a>
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
    <!-- Modal -->
    
    
    <script src="/style/js/other/jquery/jquery.js"></script>
    <script src="/style/js/other/bootstrap/bootstrap.min.js"></script>
    <script src="/style/js/sea.js"></script>
    <script src="/style/js/n/nquery.js"></script>
    
    <script>
        var bits = ["bit","bit.util","bit.http"];
        var url = "";
        for(var i in bits){
            bit = "/style/js/n/" + bits[i] + ".js";
            url += "="+bit;
        }
        url = "/style/combine/"+url;
        seajs.use(url,function(){                       
            $$.debug = true;
            bhttp.selector = $("#test");
            bhttp.get(function(json,obj){                                               
                obj.selector.insertData(json);
            },"json");
        });             
    </script>
    

</body>

</html>