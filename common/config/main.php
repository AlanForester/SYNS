<?php
return [
    'name' => 'SYNS',
    'sourceLanguage' => 'en-EN',
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'assignmentTable' => 'access_assignment',
            'itemTable' => 'access',
            'ruleTable' => 'access_rule',
            'itemChildTable' => 'access_legacy',
            //'cache' => true,
            'defaultRoles' => ['admin','op','voice','user','blocked'],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'ru',
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'cachingDuration' => 84600,
                    'enableCaching' => false,
                ],
            ],
        ],
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Component',
        ],
    ],
];
