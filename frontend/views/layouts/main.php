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
        ['label' => \kartik\icons\Icon::show('book').'文章', 'url' => ['/story/default/index']],
        ['label' => \kartik\icons\Icon::show('book').'问答', 'url' => ['/story']],
        ['label' => \kartik\icons\Icon::show('book').'图片', 'url' => ['/story']],
        ['label' => \kartik\icons\Icon::show('book').'视频', 'url' => ['/story']],
        ['label' => \kartik\icons\Icon::show('book').'资源', 'url' => ['/story']],
//        ['label' => \kartik\icons\Icon::show('user').'会员', 'url' => ['/users']],
        ['label' => \kartik\icons\Icon::show('user').'排行', 'url' => ['/jour/default/top']],
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
//              'url' => ['/notification/index'],
            'linkOptions' => ['class' => 'new',],
            'options' => ['class' => 'notification-count'],
        ];
        // 个人中心
        $rightItems[] = [
            'label' => Html::img(Yii::$app->user->identity->userInfo->textAvatarUrl, [
                'width'=>50,
                'height'=>50,
            ]),
            'items' => [
                ['label' => '我的主页', 'url' => ['/user/default/index']],
                ['label' => '帐号设置', 'url' => ['/user/setting/index']],
                ['label' => '退出', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]
            ],
            'linkOptions'=>[
                'class'=>'avatar',
            ],
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
<?=$this->render('//public/footer') ?>
<?php // $this->render('//public/online') ?>
<?=$this->render('//public/float_button') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
