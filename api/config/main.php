<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'api',
    'basePath' => dirname(__DIR__),
    'name' => "轻纺家园接口",
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'file' => [
                    'class' => \yii\log\FileTarget::className(),
                    'levels' => ['error'],
//                    'categories' => ['wodrow'],
                ],
                'email' => [
                    'class' => \yii\log\EmailTarget::className(),
//                    'levels' => ['error', 'warning'],
                    'categories' => ['email'],
                    'message' => [
                        'to' => ['1173957281@qq.com', /*'developer@example.com'*/],
                        'subject' => '来自 qf_home 的新日志消息',
                    ],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::className(),
        ],
        'formatter' => [
            'class' => \yii\i18n\Formatter::className(),
            'dateFormat' => 'php:Y-m-d',
            'datetimeFormat' => 'php:Y-m-d H:i:s',
            'timeFormat' => 'php:H:i:s',
        ],
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true,
        ],
        'assetManager' => [
            'converter' =>
                [
                    'class' => \singrana\assets\Converter::className(),
                ],
        ],
        'i18n' => [
            'translations' => [
                'user' => [
                    'class' => \yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@app/messages',
                ]
            ],
        ],
        /*'response' => [
            'format' => \yii\web\Response::FORMAT_JSON,
        ],*/
    ],
    'modules' => [
        'test' => [
            'class' => \api\modules\test\Test::className(),
        ],
    ],
    'params' => $params,
];

$config = yii\helpers\ArrayHelper::merge(
    $config,
    \deepziyu\yii\rest\Controller::getConfig()
);

return $config;
