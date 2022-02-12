<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'session' => [
                'class' => 'yii\web\Session',
                'name' => 'lap_kerusakan',
                'savePath' => dirname(__DIR__,2).'/laporan-kerusakan/session/'

            ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'timeZone' => 'Asia/Jakarta',
            'defaultTimeZone' => 'Asia/Jakarta',
            'dateFormat' => 'php:d-m-Y',
            'timeFormat' => 'php:H:i',
            'datetimeFormat' => 'php:d-M-Y H:i',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'numberFormatterOptions' => [],
            'nullDisplay' => '<span class="not-set">(kosong)</span>',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'OaHKTlNJ47g7sl9n0VUT2GHi0SyUrlTF',
        ],
        'authManager' => [
                'class' => 'yii\rbac\DbManager', // only support DbManager
            ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
         /*
     	'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
             ],
         ],
    	], */
    ],
     /**/
    'as access' => [
             'class' => '\hscstudio\mimin\components\AccessControl',
             'allowActions' => [
                // add wildcard allowed action here!
                'site/*',
                'debug/*',
                'gii/*',
                'aduan-gedung/*',
                'alat-rs/*',
            //    'mimin/*',
            //    'mimin/user', // only in dev mode
                
            ],
        ],   


    'modules' => [
          /**/  'mimin' => [
                'class' => '\hscstudio\mimin\Module',
            ], 
            'gridview' =>  [
                'class' => '\kartik\grid\Module'
            ], 
            
        ],
        'as beforeRequest' => [
          'class' => 'yii\filters\AccessControl',
           'rules' => [
                [
                    'allow' => true,
                    'actions' => ['login','signup'],
                ], 
                [
                    'allow' => true,
                    'roles' => ['@'],
                ]     
           ]
        ], 
    'params' => $params,
 
   // 'defaultRoute' => 'site/login',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
