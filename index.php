<?php
date_default_timezone_set('PRC');//设置默认时区为北京时间
error_reporting( E_ALL & ~E_STRICT );     // 非严格模式
// change the following paths if necessary
if(!defined('DS'))define('DS', DIRECTORY_SEPARATOR);
if(!defined('ROOT'))define('ROOT', dirname(__FILE__));
$yii='framework/yii.php';

$config=dirname(__FILE__).'/protected/config/main.php';
// remove the following line when in production mode
 defined('YII_DEBUG') or define('YII_DEBUG',true);
require_once($yii);
Yii::createWebApplication($config)->run();

