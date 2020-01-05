<?php

namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class CheckContactCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }
    public function checkContact(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('My Application');

        $I->seeLink('Contact');
        $I->click('Contact');
        $I->wantTo('Contact'); // wait for page to be opened

        $I->see('If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.');
    }
}
