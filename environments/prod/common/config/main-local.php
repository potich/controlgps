<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=flotasgps_app',
            'username' => 'flotasgps',
            'password' => 'Cartam0vil',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.cartamovil.com',
                'username' => 'info@cartamovil.com',
                'password' => 'Cartam0vil',
                'port' => '587',
                'encryption' => 'tls',
            ],],
    ],
];
