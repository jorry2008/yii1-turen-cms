<?php
define('START', microtime(true));

require dirname(__FILE__).'/FirePHPCore/fb.php';
ob_start();

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
$app = Yii::createWebApplication($config);
$app->run();


fb('当前执行时间：'.(microtime(true)-START).'秒');
fb($_COOKIE);
fb($_SESSION);

// echo $app->basePath;
