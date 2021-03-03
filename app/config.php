<?php

$config = [
    'id' => 'app',
    'basePath' => __DIR__,
    #'language' => 'ru-RU',
    #'bootstrap' => ['log'],
    'controllerNamespace' => 'app\controllers',
    'aliases' => [
        '@npm' => __DIR__ . '/vendor/npm-asset',
        '@bower' => __DIR__ . '/vendor/bower-asset'
    ],
    /*
    'container' => [
        'definitions' => [
            \yii\widgets\LinkPager::class => LinkPager::class,
        ],
    ],*/
    'components' => [
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'session' => [
            'class' => 'yii\web\CacheSession'
        ],*/
        'assetManager' => [
            'linkAssets' => true,
        ],
        /*'errorHandler' => [
//'errorAction' => 'site/error',
            'class' => 'frontend\components\ErrorHandler'
        ],*/
        'request' => [
            'enableCookieValidation' => true,
            'enableCsrfValidation' => true,
            'cookieValidationKey' => md5('cok-mediatech'),
            'baseUrl' => ''
        ],
            /*
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\MemCache',
            'useMemcached' => extension_loaded('memcache') ? false : true,
            'servers' => [
                [
                    'host' => '127.0.0.1',
                    'port' => 11371
                ]
            ],
            'serializer' => false,
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'yandex' => [
                    'class' => 'yii\authclient\clients\Yandex',
                    'clientId' => 'fcdf9d67197147759b6c20900a25cca9',
                    'clientSecret' => '3577581f34bb420fa943456ec5311a13',
                ],
            ],
        ],*/

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                [
                    'pattern' => '<controller>/<action>',
                    'route' => '<controller>/<action>',
                    'defaults' => ['action' => 'index', 'controller' => 'form'],
                ],
            ]
        ],
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;