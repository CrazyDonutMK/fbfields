<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '98asd768dfhj65glh34',
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableSession' => false,
            'loginUrl' => null,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //['class' => 'yii\rest\UrlRule', 'controller' => ['tag', 'district', 'field']], //Стандартная маршрутизация
                //Tag
                'PUT,PATCH tag/<id>' => 'tag/update',
                'DELETE tag/<id>' => 'tag/delete',
                'GET,HEAD tag/<id>' => 'tag/view',
                'POST tag' => 'tag/create',
                'GET,HEAD tag' => 'tag/index',
                //District
                'PUT,PATCH district/<id>' => 'district/update',
                'DELETE district/<id>' => 'district/delete',
                'GET,HEAD district/<id>' => 'district/view',
                'POST district' => 'district/create',
                'GET,HEAD district' => 'district/index',
                //Field
                'PUT,PATCH field/<id>' => 'field/update',
                'DELETE field/<id>' => 'field/delete',
                'GET,HEAD field/<id>' => 'field/view',
                'POST field' => 'field/create',
                'GET,HEAD field' => 'field/index',
                'field/<id>' => 'field/options',
                'field' => 'field/options',
                //Login
                'POST login' => 'site/login',
                'login' => 'site/options',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
