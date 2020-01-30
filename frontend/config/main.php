<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => \yii\web\JsonParser::class,
            ]
        ],
        'user' => [
            'identityClass' => \common\models\User::class,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'datetimeFormat' => 'dd.MM.yyyy H:m:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'RUB',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'controller' => 'api/task',
                    'class' => \yii\rest\UrlRule::class,
                    'extraPatterns' => [
                        //'METHOD action' => 'actionFunction',
                        'POST random/<count>' => 'random',
                        'GET data-provider/<limit>' => 'data-provider',
                        'GET auth' => 'auth',
                    ],
                ],

                [
                    'controller' => 'api/user',
                    'class' => \yii\rest\UrlRule::class,
                    'extraPatterns' => [],
                ],
            ],

        ],
    ],
    'modules' => [
        'api' => [
            'class' => \frontend\modules\api\ModuleApi::class
        ],
        'account' => [
            'class' => \frontend\modules\account\Module::class
        ],
    ],
    'params' => $params,
];
