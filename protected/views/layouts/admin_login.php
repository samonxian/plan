<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" type="text/css" href="/style/css/base.css"/>   
        <link rel="stylesheet" type="text/css" href="/style/css/bootstrap/bootstrap.min.css"/>  
        <link rel="stylesheet" type="text/css" href="/style/css/validform/validate.css"/>  
        <script src="/style/js/sea.js"></script>
        <?php Yii::app()->ClientScript->registerCoreScript('jquery');?>
        <script>seajs.use('<?php echo Yii::app()->baseUrl;?>/js/admin/article_system/main.js');</script>
        <script>seajs.use('<?php echo Yii::app()->baseUrl;?>/js/admin/article_system/<?php echo $this->action->id;?>.js');</script>
        <style>
            #dom{
                width:998px;margin:auto;
                height:auto !important;height:700px; /*假定最低高度是200px*/ min-height:700px;
            }

            .mt_10{margin-top:-10px;}

        </style>

    </head>
    <?php
//       $str =  $this->codeModel;
//       $len = strripos($str,'.');
//       $str2 = substr($str,$len+1);
//       echo '<br><br>'.$str2;
    ?>

    <body baseUrl="<?php echo Yii::app()->baseUrl ?>" uniqueId="<?php echo $this->uniqueId ?>">
        <br/>
        <br/>
        <br/>
        <?php if (!empty($this->breadcrumbs)): ?>
            <div class="container-fluid">
                <?php
                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'separator' => '',
                     'homeLink' => CHtml::link( '', Yii::app()->createUrl('/' . 'bus')),
                ));
                ?>
            </div>
        <?php endif ?>
        <div  class="container-fluid">

            <?php
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'type' => 'inverse', // null or 'inverse'
                'brand' => '后台管理',
                'brandUrl' => '#',
                'fixed' => 'top',
                'fluid' => true,
                'collapse' => true, // requires bootstrap-responsive.css
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'items' => array(),
                    ),
                ),
            ));
            ?>

          
            <?php echo $content; ?>

        </div><!-- page -->

    </body>
</html>
