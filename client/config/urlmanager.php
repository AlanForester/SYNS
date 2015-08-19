<?php
return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => false,
    'rules' => [
        // ПРОФИЛЬ
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'Profile',
            'verb' => ['GET'],
            'pattern' => 'profile',
            'route' => 'profile/index',
        ],
        // Авторизация
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'Login',
            'verb' => ['POST'],
            'pattern' => 'login',
            'route' => 'auth/login',
        ],
        [
            'class' => 'yii\web\UrlRule',
            'name' => 'Logout',
            'verb' => ['GET'],
            'pattern' => 'logout',
            'route' => 'auth/logout',
        ],
    ],
];