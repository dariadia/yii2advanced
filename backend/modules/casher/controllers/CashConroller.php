<?php

namespace backend\modules\casher\controllers;

use yii\rest\ActiveController;
use yii\caching\Cache;

class TaskController extends ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionFlush()
    {
        return Cache::flush();
    }
}
