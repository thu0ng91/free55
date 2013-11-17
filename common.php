<?php
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
defined('BASE_THEME_DIR') or define('BASE_THEME_DIR',"themes");
defined('BASE_THEME_PATH') or define('BASE_THEME_PATH', dirname(__FILE__) . DS . BASE_THEME_DIR);
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$globals=dirname(__FILE__).'/protected/globals.php';
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once($yii);
$app=Yii::createWebApplication($config);
require_once($globals);
$app->run();
