<?php

$consoleConfigDir = dirname(__FILE__);

$root = $consoleConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($consoleConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');

/* uncomment if the following aliases are required */
//Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend');
//Yii::setPathOfAlias('backend', $root . DIRECTORY_SEPARATOR . 'backend');

$mainLocalFile = $consoleConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile) ? require($mainLocalFile) : array();

return CMap::mergeArray(
	array(
		'name' => 'App name',

		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
		'basePath' => 'console',
		
		// set parameters
		'params' => $params,
		
		// preload components required before running applications
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
		'preload' => array('log'),

		// setup import paths aliases
		// @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
		'import' => array(
			'common.components.*',
			'common.extensions.*',
			'common.models.*',
			'application.components.*',
			'application.models.*',
			/* uncomment to use frontend models */
			/*'root.frontend.models.*',*/
			/* uncomment to use frontend components */
			/*'root.frontend.components.*',*/
			/* uncomment to use backend components */
			/*'root.backend.components.*',*/
		),
		
		/* locate migrations folder if necessary */
		'commandMap' => array(
			'migrate' => array(
				'class' => 'system.cli.commands.MigrateCommand',
				/* change if required */
				'migrationPath' => 'root.console.migrations'
			)
		),
		
		'components' => array(
			'log' => array(
				'class' => 'CLogRouter',
				'routes' => array(
					'main' => array(
						'class' => 'CFileLogRoute',
						'levels' => 'error, warning',
						'filter' => 'CLogFilter'
					)
				)
			),
			
			'urlManager' => array(
				'urlFormat' => 'path',
				'showScriptName' => false,
				'urlSuffix' => '/',
				'rules' => $params['url.rules']
			),
			
			/* uncomment and configure to suit your needs */
			/*'request' => array(
				'hostInfo' => 'http://localhost',
				'baseUrl' => '/bp'
			),*/
						
			/*'cache' => extension_loaded('apc') ?
				array(
					'class' => 'CApcCache',
				) :
				array(
					'class' => 'CDbCache',
					'connectionID' => 'db',
					'autoCreateCacheTable' => true,
					'cacheTableName' => 'cache',
				),
			'contentCache' => array(
				'class' => 'CDbCache',
				'connectionID' => 'db',
				'autoCreateCacheTable' => true,
				'cacheTableName' => 'cache',
			),*/
		),
	),
	$mainLocalConfiguration
);
