<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class RbacController extends \yii\console\Controller
{
    /**
     * @throws \Exception
     */
    public function actionInit()
    {
        $role = \Yii::$app->authManager->createRole('admin');
        $role->description = 'admin';
        \Yii::$app->authManager->add($role);

        $role = \Yii::$app->authManager->createRole('team_lead');
        $role->description = 'Team lead';
        \Yii::$app->authManager->add($role);

        $role = \Yii::$app->authManager->createRole('engineer');
        $role->description = 'рядовой сотрудник отдела';
        \Yii::$app->authManager->add($role);

        $permission = \Yii::$app->authManager->createPermission('getMyActivity');
        \Yii::$app->authManager->add($permission);
    }
}
