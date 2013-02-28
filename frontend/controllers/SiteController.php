<?php

class SiteController extends CController {
    public function actionIndex() {
	echo 'Frontend - '.Yii::app()->name.' ['.Yii::app()->language.']';
    }
} 