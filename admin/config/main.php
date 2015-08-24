<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => true
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
        ]
    ],
    'modules' => [
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Module',
            'ignoredItems' => ['config'],
            'ignoredCategories' => ['yii'],
            'patterns' => ['*.js', '*.php'],
            'jsTranslators' => ['lajax.t'],
            'root' => '@app',
            'phpTranslators' => ['::t'],
            //'allowedIPs' => ['127.0.0.1'],
            //'layout' => 'language',
            'roles' => ['?'],
            'tmpDir' => '@runtime',
            'tables' => [
                [
                    'connection' => 'db',
                    'table' => '{{%language}}',
                    'columns' => ['name', 'name_ascii']
                ]
            ]
        ],
    ],
    'params' => $params,
];
