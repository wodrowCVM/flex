<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
//\kartik\icons\Icon::map($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-fixed-top',
        ],
    ]);
    $leftItems = [
        ['label' =>  \kartik\icons\Icon::show('th-large')  . '首页', 'url' => ['/site/index'] ],
//        ['label' => \kartik\icons\Icon::show('comment').'社区', 'url' => ['/site/about']],
        ['label' => \kartik\icons\Icon::show('commenting').'帖子  ', 'url' => ['/site/about']],
        ['label' => \kartik\icons\Icon::show('user').'会员', 'url' => ['/site/contact']],
//        ['label' => Icon::show('comment') . '社区', 'url' => ['/topic'], 'active' => $topicActive],
//        ['label' => Icon::show('envelope') . '招聘', 'url' => ['/topic/default/index', 'node' => 'jobs'], 'active' => $jobsActive],
//        ['label' => \kartik\icons\Icon::show('commenting') . '动态', 'url' => ['/tweet'], 'active' => $tweetActive],
//        ['label' => \kartik\icons\Icon::show('th') . '标签', 'url' => ['/site/tags'], 'active' => $topicTagsActive],
//        ['label' => Icon::show('signal') . '新手入门', 'url' => ['/site/getstart']],
//        ['label' => \kartik\icons\Icon::show('user') . '会员', 'url' => ['/site/users']],
//        ['label' => Icon::show('plane') . '酷站', 'url' => ['/nav'], 'active' => $navActive],
    ];
    if (Yii::$app->user->isGuest) {
        $rightItems[] = ['label' => '注册', 'url' => ['/site/signup']];
        $rightItems[] = ['label' => '登录', 'url' => ['/site/login']];
    } else {
        // 提醒
        $rightItems[] = [
            'label' => Html::tag('i', '', ['class' => 'fa fa-bell']) . Html::tag('span', null),
              'url' => ['/notification/index'],
            'linkOptions' => ['class' => 'new',],
            'options' => ['class' => 'notification-count'],
        ];
        // 个人中心
        $rightItems[] = [
            'label' => Yii::$app->user->identity->username,
            'items' => [
                ['label' => '我的主页', 'url' => ['/user/default']],
                ['label' => '帐号设置', 'url' => ['/user/setting/profile']],
                ['label' => '退出', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]
            ]
        ];
        /*$rightItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';*/
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $leftItems,
        'encodeLabels' => false,
    ]);
    echo '<form class="navbar-form navbar-left" role="search" action="" method="get">
                <div class="form-group">
                    <input type="text" value="" name="keyword" class="form-control search_input" id="navbar-search" placeholder="搜索..." data-placement="bottom" data-content="请输入要搜索的关键词！">
                </div>
            </form>';
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $rightItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?php
        echo $this->render('/public/categorys_toggle');
        ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <dl class="col-sm-2">
                <dt>网站信息</dt>
                <dd><a href="<?= \yii\helpers\Url::to(['/site/about']) ?>">关于我们</a></dd>
                <dd><a href="<?= \yii\helpers\Url::to(['/site/contributors']) ?>">贡献者</a></dd>
            </dl>
            <dl class="col-sm-2">
                <dt>相关合作</dt>
                <dd><a href="<?= \yii\helpers\Url::to(['/site/contact']) ?>">联系我们</a></dd>
            </dl>
            <dl class="col-sm-2">
                <dt>关注我们</dt>
                <dd><a href="<?= \yii\helpers\Url::to(['/site/timeline']) ?>">时间线</a></dd>
            </dl>
            <dl class="col-sm-3">
                <dt> 技术采用</dt>
                <dd class="fs12">
                    由 <a href="https://github.com/wodrow">wodrow</a> 创建 项目地址: <a href="https://github.com/wodrowCVM/flex">flex</a>
                    <br/>
                    <?= Yii::powered() ?> <?= Yii::getVersion() ?>
                    <br/>
                    &copy; <?= \Yii::$app->name ?> <?= date('Y') ?>&nbsp;•&nbsp; <?= floor(Yii::getLogger()->getElapsedTime() * 1000).' ms';?>
                </dd>
            </dl>
            <div class="col-sm-3">
                <a href="http://www.qiniu.com/">
                    <img src="http://assets.qiniu.com/qiniu-transparent.png" alt="qiniu" width="240">
                </a>
                <p>赞助本站，你的LOGO将出现在这里</p>
            </div>
        </div>
    </div>
</footer>

<div class="btn-group-vertical" id="floatButton">
    <button type="button" class="btn btn-default" id="goTop" title="去顶部"><span
                class="glyphicon glyphicon-arrow-up"></span></button>
    <button type="button" class="btn btn-default" id="refresh" title="刷新"><span
                class="glyphicon glyphicon-repeat"></span></button>
    <button type="button" class="btn btn-default" id="pageQrcode" title="本页二维码"><span
                class="glyphicon glyphicon-qrcode"></span>
        <img class="qrcode" width="130" height="130" src="<?= \yii\helpers\Url::to(['/site/qrcode', 'data' => Yii::$app->request->absoluteUrl])?>" />
    </button>
    <button type="button" class="btn btn-default" id="goBottom" title="去底部"><span
                class="glyphicon glyphicon-arrow-down"></span></button>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
