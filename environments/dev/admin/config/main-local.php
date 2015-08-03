<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
];

if (!YII_ENV_TEST) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'crud' => ['class' => 'dee\gii\generators\crud\Generator'],
            'angular' => ['class' => 'dee\gii\generators\angular\Generator'],
            'mvc' => ['class' => 'dee\gii\generators\mvc\Generator'],
            'migration' => ['class' => 'dee\gii\generators\migration\Generator'],
        ]
    ];
}

return $config;
