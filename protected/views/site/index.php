


<?php
   
    $run_one = Yii::app()->curl->run('http://www.jb51.net/article/25132.htm');
    if(!$run_one->hasErrors()) {
      
        echo '<pre>';
           
           $html = $run_one->getData();
           $info = $run_one->getInfo();
           $test = new GatherWebpageInfo($html);
           $link = new GetInnerLink($html,"http://www.jb51.net");
                                    
           $test->filterData();
          
        echo '</pre>';
//        print_r( $run_one->getInfo());

    } else {
        echo '<pre>';
        var_dump($run_one->getErrors());
        echo '</pre>';
    }
?>