<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

return [
        [
            'class' => 'yii\rest\UrlRule',
            'patterns' => [
                'GET,HEAD' => 'index',
                'PUT,PATCH' => 'update',
            ],
            'except' => ['delete', 'create'],
            'controller' => [
                'user/password',
            ],
            'prefix' => 'api',
            'pluralize' => false
        ],
        [
            'class' => 'yii\rest\UrlRule',
            'patterns' => [
                'HEAD' => 'view',
                'PUT,PATCH' => 'update',
            ],
            'except' => ['delete', 'create', 'index'],
            'controller' => [
                'user/profile',
            ],
            'prefix' => 'api',
            'pluralize' => false
        ],
        [
            'class' => 'yii\rest\UrlRule',
            'patterns' => [
                'POST' => 'login',
            ],
            'except' => ['delete', 'create', 'update', 'view', 'index'],
            'controller' => [
                'user/login',
            ],
            'prefix' => 'api',
            'pluralize' => false
        ],
        [
            'class' => 'yii\rest\UrlRule',
            'tokens' => [
                '{id}' => '<id:\w+>',
            ],
            'except' => ['delete', 'create', 'update', 'index'],
            'controller' => [
                'user' => 'user/search',
            ],
            'prefix' => 'api',
            'pluralize' => false
        ],
];