<?php

namespace console\controllers;

use yii\console\Controller;
use yii\helpers\Console;


class ConsoleGreatingsController extends Controller
{

    public function actionIndex()
    {
        $greating = $this->ansiFormat("Hello, world", Console::FG_YELLOW);
        echo  $greating . PHP_EOL;
    }
}
