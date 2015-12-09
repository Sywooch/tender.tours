<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=mytender',
            'username' => 'root',
            'password' => '2',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // 'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
//                'host' => 'mail.ukraine.com.ua',
                'username' => 'my.tender.tours@gmail.com',
//                'username' => 'robot@tender.tours',
                'password' => 'Din@r111',
//                'password' => 'eF6oaoP2G9V3',
                'port' => '587',
//                'port' => '25',
                'encryption' => 'tls',
              ]
        ],
    ],
];
