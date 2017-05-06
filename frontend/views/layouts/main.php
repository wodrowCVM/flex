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
        ['label' =>  \kartik\icons\Icon::show('th-large')  . '社区', 'url' => ['/site/index'] ],
//        ['label' => \kartik\icons\Icon::show('comment').'社区', 'url' => ['/site/about']],
        ['label' => \kartik\icons\Icon::show('commenting').'帖子', 'url' => ['/poster']],
        ['label' => \kartik\icons\Icon::show('book').'文章', 'url' => ['/story']],
        ['label' => \kartik\icons\Icon::show('user').'会员', 'url' => ['/users']],
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
                ['label' => '我的主页', 'url' => ['/user/default/index']],
                ['label' => '帐号设置', 'url' => ['/user/setting/index']],
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
//        echo $this->render('/public/categorys_toggle');
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

<div class="panel panel-default online">
    <div class="panel-heading">在线<br><em>283</em>人</div>
    <div class="panel-body">
        <div class="nano has-scrollbar" style="height: 727px;"><ul class="nano-content" tabindex="0" style="right: -15px;">
                <li><a href="/user/26533" rel="author"><img src="/uploads/avatar/000/02/65/33_avatar_small.jpg" alt="夭折的青春"></a></li>
                <li><a href="/user/27825" rel="author"><img src="/uploads/avatar/000/02/78/25_avatar_small.jpg" alt="lionskys"></a></li>
                <li><a href="/user/28792" rel="author"><img src="/uploads/avatar/000/02/87/92_avatar_small.jpg" alt="扑倒ricky"></a></li>
                <li><a href="/user/30341" rel="author"><img src="/uploads/avatar/000/03/03/41_avatar_small.jpg" alt="sjjliqpl"></a></li>
                <li><a href="/user/30998" rel="author"><img src="/uploads/avatar/000/03/09/98_avatar_small.jpg" alt="wodrow"></a></li>
                <li><a href="/user/32647" rel="author"><img src="/images/noavatar_small.gif" alt="张震宇"></a></li>
                <li><a href="/user/33081" rel="author"><img src="/images/noavatar_small.gif" alt="麦乐"></a></li>
                <li><a href="/user/33795" rel="author"><img src="/uploads/avatar/000/03/37/95_avatar_small.jpg" alt="武家天下"></a></li>
                <li><a href="/user/33900" rel="author"><img src="/uploads/avatar/000/03/39/00_avatar_small.jpg" alt="魏曦教你学"></a></li>
                <li><a href="/user/34737" rel="author"><img src="/images/noavatar_small.gif" alt="小公举"></a></li>
                <li><a href="/user/34766" rel="author"><img src="/images/noavatar_small.gif" alt="leowenyang"></a></li>
                <li><a href="/user/35502" rel="author"><img src="/uploads/avatar/000/03/55/02_avatar_small.jpg" alt="dyyii"></a></li>
                <li><a href="/user/35685" rel="author"><img src="/uploads/avatar/000/03/56/85_avatar_small.jpg" alt="raijin"></a></li>
                <li><a href="/user/39407" rel="author"><img src="/uploads/avatar/000/03/94/07_avatar_small.jpg" alt="张2013帅"></a></li>
                <li><a href="/user/39438" rel="author"><img src="/uploads/avatar/000/03/94/38_avatar_small.jpg" alt="diligentyang"></a></li>
                <li><a href="/user/40343" rel="author"><img src="/uploads/avatar/000/04/03/43_avatar_small.jpg" alt="duandaxei"></a></li>
                <li><a href="/user/40703" rel="author"><img src="/uploads/avatar/000/04/07/03_avatar_small.jpg" alt="易语晓乐"></a></li>
                <li><a href="/user/40914" rel="author"><img src="/images/noavatar_small.gif" alt="yokoelement"></a></li>
                <li><a href="/user/41828" rel="author"><img src="/uploads/avatar/000/04/18/28_avatar_small.jpg" alt="Wordsworth"></a></li>
                <li><a href="/user/41911" rel="author"><img src="/images/noavatar_small.gif" alt="zzh97111"></a></li>
                <li><a href="/user/41969" rel="author"><img src="/images/noavatar_small.gif" alt="cherishxing"></a></li>
            </ul><div class="nano-pane"><div class="nano-slider" style="height: 634px; transform: translate(0px, 0px);"></div></div></div>
    </div>
    <div class="panel-footer">会员<br><em>21</em>人</div>
</div>

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
