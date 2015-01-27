<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    
    <meta name="format-detection" content="telephone=no">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="/style/css/bootstrap/bootstrap.css">
    
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
        
    <table id="ns_test" class="table table-bordered">
        <tbody>
<?php 
    foreach($data['ns_test']['data'] as $d){ ?><tr class="" style="display: table-row;">
            <td><?php echo $d['user'];?></td>
            <td><?php echo $d['pwd'];?></td>
        </tr>
<?php 
    }
?>
</tbody></table> 
    <table id="ns_test2" class="table table-bordered">
        <tbody>
<?php 
    foreach($data['ns_test2']['data'] as $d){ ?><tr class="" style="display: table-row;">
            <td><?php echo $d['user'];?></td>
            <td><?php echo $d['pwd'];?></td>
        </tr>
<?php 
    }
?>
</tbody></table>     
    <script src="/style/js/other/jquery/jquery-1.11.2.min.js"></script>
    <script src="/style/js/other/bootstrap/bootstrap.min.js"></script>
    <script src="/style/js/sea.js"></script>    
    
    
    



</body>
</html>