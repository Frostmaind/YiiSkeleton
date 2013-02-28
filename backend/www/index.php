<?php

date_default_timezone_set('UTC');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);


if (YII_DEBUG) {
	error_reporting(-1);
	ini_set('display_errors', true);
}

chdir(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..');

require_once('common' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Yii' . DIRECTORY_SEPARATOR . 'yii.php');
$config = require('backend' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php');
require_once('common' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'WebApplication.php');
require_once('common' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'global.php');

$app = Yii::createApplication('WebApplication', $config);

$app->run();

/* uncomment if you wish to debug your resulting config */
/* echo '<pre>' . dump($config) . '</pre>'; */
