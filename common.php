<?php
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
defined('BASE_THEME_DIR') or define('BASE_THEME_DIR',"themes");
defined('BASE_THEME_PATH') or define('BASE_THEME_PATH', dirname(__FILE__) . DS . BASE_THEME_DIR);

require_once('version.php');

$yii=dirname(__FILE__).'/framework/yii.php';
$globals=dirname(__FILE__).'/protected/globals.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);

defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once($yii);
$app=Yii::createWebApplication($config);
require_once($globals);
$app->run();
