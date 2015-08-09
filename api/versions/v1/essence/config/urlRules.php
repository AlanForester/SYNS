<?php
/**
 * Date: 07.05.15
 * Time: 18:54
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

return [
    [
        'class' => 'yii\rest\UrlRule',
        'patterns' => [
            'GET,HEAD {essence}' => 'view',
        ],
        'tokens' => [
            '{essence}' => '<id:.*>',
        ],
        'except' => ['delete', 'update', 'index', 'create'],
        'controller' => [
            'essence' => 'essence/search',
        ],
        'pluralize' => false
    ],
//        [
//            'class' => 'yii\rest\UrlRule',
//            'patterns' => [
//                'POST' => 'create',
//            ],
//            'except' => ['delete', 'update', 'view', 'index'],
//            'controller' => [
//                'essence/create',
//            ],
//            'prefix' => 'api',
//            'pluralize' => false
//        ],
//        [
//            'class' => 'yii\rest\UrlRule',
//            'patterns' => [
//                'PUT,PATCH {essence}'  => 'update',
//            ],
//            'tokens' => [
//                '{essence}' => '<essence:.*>',
//            ],
//            'except' => ['delete', 'create', 'view', 'index'],
//            'controller' => [
//                'essence/update',
//            ],
//            'prefix' => 'api',
//            'pluralize' => false
//        ],
];