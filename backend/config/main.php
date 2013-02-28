<?php
$backendConfigDir = dirname(__FILE__);

$root = $backendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($backendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('backend', $root . DIRECTORY_SEPARATOR . 'backend');
Yii::setPathOfAlias('www', $root. DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'www');
/* uncomment if you need to use frontend folders */
/* Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend'); */

$mainLocalFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile)? require($mainLocalFile): array();

return CMap::mergeArray(
	array(
		'name' => 'App name',
		
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
		'basePath' => 'backend',
		
		// set parameters
		'params' => $params,
		
		// preload components required before running applications
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
		'preload' => array(/*'bootstrap',*/'log'),
		
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail
		//'language' => 'en_US',
		
		// uncomment if a theme is used
		/*'theme' => '',*/
		
		// setup import paths aliases
		// @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
		'import' => array(
			'common.components.*',
			'common.extensions.*',
			/* uncomment if required */
			/* 'common.extensions.behaviors.*', */
			/* 'common.extensions.validators.*', */
			'common.models.*',
			// uncomment if behaviors are required
			// you can also import a specific one
			/* 'common.extensions.behaviors.*', */
			// uncomment if validators on common folder are required
			/* 'common.extensions.validators.*', */
			'application.components.*',
			'application.controllers.*',
			'application.models.*'
		),
		
		/* uncomment and set if required */
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
		/* 'modules' => array(), */
		
		'components' => array(
			'user' => array(
				'allowAutoLogin'=>true,
			),
			
			/* load bootstrap components */
			/*'bootstrap' => array(
				'class' => 'common.extensions.bootstrap.components.Bootstrap',
				'responsiveCss' => true,
			),*/
			
			'errorHandler' => array(
				// @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
				'errorAction'=>'site/error'
			),
			
			'urlManager' => array(
				'urlFormat' => 'path',
				'showScriptName' => false,
				'urlSuffix' => '/',
				'rules' => array(
					/* for REST please @see http://www.yiiframework.com/wiki/175/how-to-create-a-rest-api/ */
					/* other @see http://www.yiiframework.com/doc/guide/1.1/en/topics.url */
					'<controller:\w+>/<id:\d+>' => '<controller>/view',
					'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
					'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				),
			),
			
			/* make sure you have your cache set correctly before uncommenting */
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