<?php

$paramsLocalFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'params-local.php';
$paramsLocalFileArray = file_exists($paramsLocalFile) ? require($paramsLocalFile) : array();

$paramsCommonFile = $frontendConfigDir . DIRECTORY_SEPARATOR  . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
		'common' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'params.php';
$paramsCommonArray = file_exists($paramsCommonFile) ? require($paramsCommonFile) : array();

return CMap::mergeArray(
	$paramsCommonArray,
	// merge frontend specific with resulting env-local merge *override by local
	CMap::mergeArray(
		array(
			// add here all frontend-specific parameters
		),
		$paramsLocalFileArray
	)
);
		