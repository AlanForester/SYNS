<?php

$config = [
    'components' => [
        'request' => [
            'cookieValidationKey' => '',
        ],
        'view' => [

        ],
    ],
];

if (!YII_ENV_TEST) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
}

return $config;
