<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Task Tracker';

?>

<h1>You can manage all your projects from here</h1>
<div class="projects">
    <?= Html::a('Project', ['/controller/action'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Project', ['/controller/action'], ['class' => 'btn btn-primary']) ?>
</div>