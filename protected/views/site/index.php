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
        .repeatHTML{
            display: none;
        }
        .modal-footer {
            padding: 5px;
        }
        .modal-content{
            top:150px;
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
    
    <table id="ns_test" class="table table-bordered">
        <tr class="repeatHTML">
            <td>{$user}</td>
            <td>{$pwd}</td>
        </tr>
    </table> 
    <table id="ns_test2" class="table table-bordered">
        <tr class="repeatHTML">
            <td>{$user}</td>
            <td>{$pwd}</td>
        </tr>
    </table>     
    <script src="/style/js/other/jquery/jquery-1.11.2.min.js"></script>
    <script src="/style/js/other/bootstrap/bootstrap.min.js"></script>
    <script src="/style/js/sea.js"></script>    
    
    <script class="create_php_for_remove">
        var bits = ["nquery","bit","bit.util","bit.http","bit.tophp","bit.msg"];
        var url = "";
        for(var i in bits){
            bit = "/style/js/n/" + bits[i] + ".js";
            url += "="+bit;
        }
        url = "/style/combine/"+url;
        seajs.use(url,function(){                       
            $$.debug = false;
            bHttp.selector = $("#ns_test");
            bHttp.get(function(json,obj){                                               
                $("#ns_test").insertData(json.ns_test.data);
                $("#ns_test2").insertData(json.ns_test.data);
                bPhp.listViewDoms["#ns_test"] = "";
                bPhp.listViewDoms["#ns_test2"] = "";
            },"json");
        });             
    </script>
    

</body>

</html>