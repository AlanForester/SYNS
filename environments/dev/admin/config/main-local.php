<?php

$config = [
    'components' => [
        'request' => [
            'cookieValidationKey' => '',
        ],
        'view' => [
            'renderers' => [
                'haml' => [
                    'class' => 'admin\components\ViewRenderer',
                    'cachePath' => '@runtime/cache',
                    'debug' => TRUE,
                    'options' => [
                        'format' => 'html5',
                        'enable_escaper' => TRUE,
                        'escape_html' => false,
                        'escape_attrs' => TRUE,
                        'cdata' => TRUE,
                        'autoclose' => array('meta', 'img', 'link', 'br', 'hr', 'input', 'area', 'param', 'col', 'base'),
                        'charset' => 'UTF-8',
                        'enable_dynamic_attrs' => TRUE,
                    ],
                    'filters' => [
                        'coffee' => [
                            'filter' => 'CoffeeScript',
                            'options' => [
                                'header' => true,
                                'tokens' => null,
                                'trace' => null,
                            ],
                        ],
                        'less' => [
                            'filter' => 'LeafoLess',
                            'options' => [
                                'importDirs' => [],
                            ],
                        ],
                        'scss' => [
                            'filter' => 'Scss',
                            'options' => [
                                'importDirs' => [],
                                'enableCompass' => false,
                            ],
                        ],
                        'markdown' => [
                            'filter' => 'MichelfMarkdown',
                            'options' => [
                                'forceOptimization' => true,
                                'empty_element_suffix' => " />",
                                'tab_width' => 4,
                                'no_markup' => false,
                                'no_entities' => false,
                                'predef_urls' => [],
                                'predef_titles' => [],
                            ],
                        ],
                    ],
                ],
            ],
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
