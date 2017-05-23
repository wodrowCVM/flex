<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'frontend',
    'basePath' => dirname(__DIR__),
    'name' => "Get√flexible",
    'language' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'redactor' => [
            'class' => \yii\redactor\RedactorModule::className(),
//            'uploadDir' => '@webroot/images/redactor',
//            'uploadUrl' => '@web/images/redactor',
//            'imageAllowExtensions'=>['jpg','png','gif']
        ],
        'user' => [ // 用户中心
            'class' => \frontend\modules\user\UserModule::className(),
        ],
        'jour' => [ // 教程 介绍
            'class' => 'frontend\modules\jour\JourModule',
        ],
        'story' => [ // 文章故事
            'class' => 'frontend\modules\story\StoryModule',
        ],
        'test' => [ // 测试
            'class' => \frontend\modules\test\TestModule::className(),
        ],
        'poster' => [ // 帖子
            'class' => 'frontend\modules\poster\PosterModule',
        ],
        'ask' => [ // 问答
            'class' => 'frontend\modules\ask\AskModule',
        ],
        'image' => [ // 图片
            'class' => 'frontend\modules\image\ImageModule',
        ],
        'vedio' => [ // 视频
            'class' => 'frontend\modules\vedio\VedioModule',
        ],
        'resource' => [ // 资源
            'class' => 'frontend\modules\resource\ResourceModule',
        ],
        'talk' => [ // 说说
            'class' => 'frontend\modules\talk\TalkModule',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'rules' => [],
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
    ],
    'as access' => [
        'class' => \frontend\behaviors\Check::className(),
        'except' => [
            'gii/*',
            'debug/*',
            'site/*',
            'jour/*',
            'user/default/member-info',
            'story/*',
            'talk/default/index',
        ],
        'rules' => [
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],
    'params' => $params,
];

return $config;
