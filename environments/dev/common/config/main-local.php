<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=timeshift',
            'username' => 'root',
            'password' => '842655',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => TRUE,
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.yandex.com',
//                'username' => 'timeshift@clevertek.org',
//                'password' => '842655',
//                'port' => '465',
//                'encryption' => 'ssl',
//            ],
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => ['timeshift@clevertek.org' => 'TimeShift'],
            ],
            'textLayout' => FALSE,
            //'viewPath' => '@app/mail'

        ],
    ],
];
