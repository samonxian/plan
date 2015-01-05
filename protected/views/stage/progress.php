
<style>
    body{
        background:#9ac8f4 url("<?php echo Yii::app()->baseUrl?>/images/bg.jpg") center top no-repeat;
    }
    .loading-box{
        padding-top:350px;
    }
    .gameName{
        width:600px;
        text-align: center;
        font:30px/60px "微软雅黑";
        margin:0 auto;
        color:#264770;
    }

    .loadin-bar,.loadin-bar span{
        width:230px;
        background: url("<?php echo Yii::app()->baseUrl?>/images/loadingBar.png") 0 -6px no-repeat;
        height: 5px;
        display: block;
        margin:0 auto;
        overflow: hidden;
    }
    .loadin-bar span{
        background-position: 0 0;
        float: left;
    }
</style>

    <div class="loading-box">
        <h2 class="gameName">正在为您打开<?php echo $model->name;?></h2>
        <span class="loadin-bar">
            <span id="loadingBar" style="width:0%"></span>
        </span>
    </div>
    <script>
        function loadedFunction(id,vote)
        {
            var getload =document.getElementById(id);
            var i =0,n=vote;
            function loaded()
            {
                getload.style.width=i+"%"
                if(i<n){
                    return i+=3;
                }else{
                    window.location.href = '<?php echo $model->registerAddress;?>';
                    clearInterval(loadtime)
                }
            }
            var loadtime = setInterval(loaded,20)
        }
        loadedFunction("loadingBar",100)
    </script>
