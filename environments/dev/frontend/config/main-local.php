<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'view' => [
            'renderers' => [
                'haml' => [
                    'class' => 'app\components\ViewRenderer',
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
                                // add a "Generated by..." header
                                'header' => true,
                                // reference to token stream (debugging)
                                'tokens' => null,
                                // file to write parser trace to (debugging)
                                'trace' => null,
                            ],
                        ],
                        'less' => [
                            // Package: "leafo/lessphp"
                            'filter' => 'LeafoLess',
                            'options' => [
                                // import dirs
                                'importDirs' => [],
                            ],
                        ],
                        'scss' => [
                            // Package: "leafo/scssphp"
                            'filter' => 'Scss',
                            'options' => [
                                // import dirs
                                'importDirs' => [],
                                'enableCompass' => false,
                            ],
                        ],
                        'markdown' => [
                            // Package: "michelf/php-markdown"
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
}

return $config;
