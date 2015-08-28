<?php
return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => false,
    'rules' => [
        // Карты
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'MapStats',
            'verb' => ['GET'],
            'pattern' => 'map',
            'route' => 'map/common',
        ],
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'TractMap',
            'verb' => ['GET'],
            'pattern' => 'map/<id:\d+>',
            'route' => 'map/index',
        ],
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'MarkMap',
            'verb' => ['GET'],
            'pattern' => 'map/object/<mark:\w+>',
            'route' => 'map/essence',
        ],
        // Марки
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'Mark',
            'verb' => ['GET'],
            'pattern' => 'common',
            'route' => 'object/common',
        ],
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'Mark',
            'verb' => ['GET'],
            'pattern' => '<object:\w+>',
            'route' => 'object/index',
        ],
    ],
];