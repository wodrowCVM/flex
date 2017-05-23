<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-9
 * Time: 上午9:45
 */
?>
<?php
\yii\bootstrap\NavBar::begin([
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
//    ['label' => \kartik\icons\Icon::show('book').'问答', 'url' => ['/ask']],
//    ['label' => \kartik\icons\Icon::show('book').'图片', 'url' => ['/image']],
//    ['label' => \kartik\icons\Icon::show('book').'视频', 'url' => ['/vedio']],
//    ['label' => \kartik\icons\Icon::show('book').'资源', 'url' => ['/resource']],
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
    /*$rightItems[] = [
        'label' => \yii\helpers\Html::tag('i', '', ['class' => 'fa fa-bell']) . \yii\helpers\Html::tag('span', null),
//              'url' => ['#'],
        'linkOptions' => ['class' => 'new',],
        'options' => ['class' => 'notification-count'],
    ];*/
    // 个人中心
    $rightItems[] = [
        'label' => \yii\helpers\Html::img(Yii::$app->user->identity->userInfo->textAvatarUrl, [
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
echo \common\components\rewrite\Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $leftItems,
    'activateParents' => true,
//    'activateItems' => false,
    'encodeLabels' => false,
]);
echo '<form class="navbar-form navbar-left" role="search" action="" method="get">
                <div class="form-group">
                    <input type="text" value="" name="keyword" class="form-control search_input" id="navbar-search" placeholder="搜索..." data-placement="bottom" data-content="请输入要搜索的关键词！">
                </div>
            </form>';
echo \common\components\rewrite\Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $rightItems,
    'encodeLabels' => false,
]);
\yii\bootstrap\NavBar::end();
?>
