<?php

$paramsLocalFile = $consoleConfigDir . DIRECTORY_SEPARATOR . 'params-local.php';
$paramsLocalFileArray = file_exists($paramsLocalFile) ? require($paramsLocalFile) : array();

$paramsCommonFile = $consoleConfigDir . DIRECTORY_SEPARATOR  . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
	'common' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'params.php';

$paramsCommonArray = file_exists($paramsCommonFile) ? require($paramsCommonFile) : array();

return CMap::mergeArray(
	$paramsCommonArray,
	// merge console specific with resulting env-local merge *override by local
	CMap::mergeArray(
		array(
			// add here all console-specific parameters
		),
		$paramsLocalFileArray
	)
);
