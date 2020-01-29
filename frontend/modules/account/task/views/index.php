<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'project_id',
                'format' => 'raw',
                'value' => function (common\models\Task $model) {
                    return Html::a($model->project_id, ['/project/view', 'id' => $model->project_id]);
                }
            ],
            'author_id',
            'executor_id',
            'title',
            //'description:ntext',
            'priority',
            [
                'attribute' => 'status',
                // 'value' => function (common\models\Task $model) {
                //     return common\models\Task::getStatusName()[$model->status];
                // },
                'filter' => [1 => 'New', 2 => 'In Progress', 3 => 'Done']
            ],
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>