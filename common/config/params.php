<?php

$commonConfigDir = dirname(__FILE__);

// get local parameters in
$commonParamsLocalFile = $commonConfigDir . DIRECTORY_SEPARATOR . 'params-local.php';
$commonParamsLocal = file_exists($commonParamsLocalFile) ? require ($commonParamsLocalFile) : array();

return CMap::mergeArray(
	array(
		// cache settings -if APC is not loaded, then use CDbCache
		'php.exePath' => '/usr/bin/php'
	), 
	$commonParamsLocal
);
