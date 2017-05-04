<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'name' => '轻纺家园管理中心',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => \mdm\admin\Module::className(),
            'mainLayout' => '@app/views/layouts/main.php',
            'layout' => 'left-menu',
            'menus' => [
                'user' => null, // disable menu
            ],
        ],
        'treemanager' =>  [
            'class' => \kartik\tree\Module::className(),
        ],
        'test' =>[
            'class' => \backend\modules\test\Test::className(),
        ],
        'category' =>[
            'class' => \backend\modules\category\Category::className(),
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => \common\models\User::className(),
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::className(), // or use 'yii\rbac\DbManager'
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'assetManager' => [
            'converter' =>[
                'class' => \singrana\assets\Converter::className(),
            ],
        ],
    ],
    'as access' => [
        'class' => \mdm\admin\components\AccessControl::className(),
        'allowActions' => [
            'site/*',
            'debug/*',
        ]
    ],
    'params' => $params,
];

return $config;
