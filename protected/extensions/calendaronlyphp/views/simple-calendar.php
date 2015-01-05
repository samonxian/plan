

<div class="thisBigTitleWrapper" id="bg_d">
      <div class="thisBigTitle xScreen msya">
        <p class="tt_k fl">开服日历</p>
            <p class="tt_r fr"><a href="<?php echo Yii::app()->createUrl("stage/lishi ");?>" target="_blank">全部开服</a></p>
      </div>
    </div>

    <div class="selectYM msya" id="YM_d">
<div class="selectYMSpace">
      <div class="sNext fr"><a  href="<?php echo $this->getNextLink();?>">Next&gt;</a></div>
      <div class="sPrev fl"><a  href="<?php echo $this->getPreviousLink();?>">&lt;&lt;Prev</a></div>

      <div class="sYear fl">
        <p id="calendar_year">2014年</p>
      </div>
      <div class="thisDrop fl"><a onclick="document.getElementById('sYearDrop').style.display=''" href="javascript:;">thisDrop</a></div>
      <div onmouseover="this.style.display=''" onmouseout="this.style.display='none'" onclick="this.style.display='none'" style="display:none" id="sYearDrop" class="sYearDrop">
        <ul>
            <?php
                $year = $this->getYear();
                for($i = 0; $i<4;$i++){ 
                    $year = $year-$i;
                    $href = Yii::app()->createUrl("stage/lishi?year=".$year."&month=1&day=1");
                    echo '<li><a href="'.$href.'">'.$year.'年</a></li>';
                }
            ?>
              
            
        </ul>
      </div>
      <input id="year" type="hidden" value="2014">


      <div class="sMonth fl">
        <p id="calendar_mouth">
            <?php 
                $month = $this->getMonth();
                if(isset($_GET['month'])) $month = $_GET['month'];
                echo $month;
            ?>
            月</p>
      </div>
      <div class="thisDrop fl"><a onclick="document.getElementById('sMonthDrop').style.display=''" href="javascript:;">thisDrop</a></div>
      <div onmouseover="this.style.display=''" onmouseout="this.style.display='none'" onclick="this.style.display='none'" style="display:none" id="sMonthDrop" class="sMonthDrop">
      <?php
            $year = $this->getYear();
       ?>
          <ul>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=1&day=1");?>">1月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=2&day=1");?>">2月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=3&day=1");?>">3月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=4&day=1");?>" >4月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=5&day=1");?>">5月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=6&day=1");?>" >6月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=7&day=1");?>" >7月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=8&day=1");?>" >8月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=9&day=1");?>" >9月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=10&day=1");?>" >10月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=11&day=1");?>" >11月</a></li>
              <li><a href="<?php echo Yii::app()->createUrl("stage/lishi?year=$year&month=12&day=1");?>" >12月</a></li>
        </ul>
      </div>
    </div>
</div>
<input id="mouth" type="hidden" value="03">
    <div class="thisInnerWrapper xScreen2 btn msya">
      <div class="thisCalendarWrapper">
        <div class="thisCalendar">
              <ul class="clearfix">
                   <?php 
                        $daysStarted = false; $day = 1; 
                    //                                            $this->daysInCurrentMonth;
                    ?>

                    <?php for($i = 1; $i <= 31; $i++): ?>
                        <?php if(!$daysStarted) $daysStarted = 1; ?>

                        <li <?php if($day == $this->day) echo 'class="current"'; ?>>
                            <?php if($daysStarted && $day <= $this->daysInCurrentMonth): ?>
                                <?php echo CHtml::link($day, $this->getDayLink($day,'stage/lishi')); $day++; //日期循环输出?>
                            <?php endif; ?>
                        </li>
                    <?php endfor; ?>
              </ul>
            </div>
      </div>
    </div>

    <div class="thisBottomShadowWrapper">
        <i class="fr"></i><em class="fl"></em>
    </div>

</div>
