<?php
return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => false,
    'rules' => [
        // КАРТЫ
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'MapStats',
            'verb' => ['GET'],
            'pattern' => 'map',
            'route' => 'map/common',
        ],
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'ChainMap',
            'verb' => ['GET'],
            'pattern' => 'map/<id:\d+>',
            'route' => 'map/index',
        ],
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'ScienceMap',
            'verb' => ['GET'],
            'pattern' => 'map/category/<science:\w+>',
            'route' => 'map/science',
        ],
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'EssenceMap',
            'verb' => ['GET'],
            'pattern' => 'map/object/<essence:\w+>',
            'route' => 'map/essence',
        ],
        // СУЩНОСТИ
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'EssenceOfScience',
            'verb' => ['GET'],
            'pattern' => '<essence:\w+>(<science:\w+>)',
            'route' => 'essence/index',
        ],
        // НАУКИ
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'Sciences',
            'verb' => ['GET'],
            'pattern' => 'sciences',
            'route' => 'science/common',
        ],
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'Science',
            'verb' => ['GET'],
            'pattern' => 'science/<science:\w+>',
            'route' => 'science/index',
        ],
    ],
];