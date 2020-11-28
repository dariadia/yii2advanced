<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->authManager;
        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);
        $developerRole = $auth->createRole('developer');
        $auth->add($developerRole);

        $developers = User::find()->where(['!=', 'username', 'admin']);
        foreach ($developers->each() as $developer) {
            $auth->assign($developerRole, $developer->id);
        }

        $admins = User::find()->where(['=', 'username', 'admin']);

        foreach ($admins->each() as $admin) {
            $auth->assign($adminRole, $admin->id);
        }
    }
}
