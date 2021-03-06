<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerMap' => [
    'export' => 'phpnt\exportFile\controllers\ExportController'
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'YYRpZheteUEY5X3esFrb6nvoqN_WkWWK',
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
            'viewPath' => '@app/mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'develop24else@gmail.com',
                'password' => 'else12345',
                'port' => '587',
                'encryption' => 'tls',
        ],
        
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

        //  'urlManager' => [
        //     'class' => 'yii\web\UrlManager',
        //     // 'enablePrettyUrl' => true,
        //     // 'showScriptName' => false,
        //     'rules' => array(
        //         '<controller:\w+>/<id:\d+>' => '<controller>/view',
        //         '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        //         '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        //         'surat/create/<idkasus:\d+>/idjenissurat:\d+>' => 'surat/create',
        //     ),
        // ],
    ],
	
	'modules'=>[
		'gridview' =>  [
			'class' => '\kartik\grid\Module'
			// enter optional module parameters below - only if you need to  
			// use your own export download action or custom translation 
			// message source
			// 'downloadAction' => 'gridview/export/download',
			// 'i18n' => []
		],
		'pdfjs' => [
			'class' => '\yii2assets\pdfjs\Module',
		],

	],
	
    'params' => $params,
	/*'params' => [
		'fileUploadUrl' => 'uploads/', 
        'adminEmail' => 'develop24else@gmail.com',
	],*/
      
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
        'allowedIPs' => ['127.0.0.1', '::1', '10.4.143.23','10.2.123.8', '192.168.200.35'],
    ];
}

return $config;
