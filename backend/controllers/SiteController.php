<?php

class SiteController extends CController {
    public function actionIndex() {
	echo 'Backend - '.Yii::app()->name.' ['.Yii::app()->language.']';
    }
} 