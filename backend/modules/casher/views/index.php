<?php

use yii\helpers\Html;

Html::a('Flush Cash', ['flush'], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => 'Are you sure you want to flush all cash?',
        'method' => 'post',
    ],
]);
