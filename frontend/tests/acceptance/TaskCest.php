<?php

namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class TaskCest
{
    public function checkTask(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/task'));
        $I->see('Tasks');
    }
}
