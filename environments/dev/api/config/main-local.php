<?php

$config = [
    'components' => [
        'request' => [
            'class' => '\yii\web\Request',
            'enableCookieValidation' => FALSE,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'throwException' => TRUE,
            ],
        ],
    ],
];

return $config;
