<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-11
 * Time: 上午9:41
 */
$this->title = "今日签到";
$this->params['breadcrumbs'][] = $this->title;
$today_m = \common\models\UserSignIn::find()->where(['date'=>date("Ymd")-1]);
$today_sign_in = $today_m->all();
$countiously_sign_in = \common\models\UserSignIn::find()->select([
    '*',
    'max(countinously_days) as countinously_days',
])->orderBy(['countinously_days'=>SORT_DESC, 'time'=>SORT_ASC])->groupBy(['user_id'])->limit(100)->all();
//var_dump($countiously_sign_in[0]);exit;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="page-header">
            <h1>今日签到会员</h1>
            <span class="pull-right stat">
                昨日签到：<strong><?=\common\models\UserSignIn::find()->where(['date'=>date("Ymd")-1])->count() ?></strong>
                上周同期：<strong><?=\common\models\UserSignIn::find()->where(['date'=>date("Ymd")-7])->count() ?></strong>
                今日签到：<strong><?=$today_m->count() ?></strong>
            </span>
        </div>
        <ul class="media-list registration">
            <?php foreach($today_sign_in as $k => $v): ?>
                <li class="media col-lg-4 col-md-4" style="float: left; margin-bottom: 15px; font-size: 12px; margin-top: 0;">
                    <div class="media-left">
                        <?=\dmstr\helpers\Html::a(\dmstr\helpers\Html::img($v->user->userInfo->getTextAvatarUrl(), ['width'=>60, 'height'=>60, 'class'=>"media-object", 'alt'=>$v->user->username]), $v->user->getMemberUrlArr(), ['rel'=>"author"]) ?>
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            c
                            <em>NO. <i><?=$k+1 ?></i></em>
                        </div>
                        <div class="media-content">
                            签到时间：<i><?=date("H:i:s", $v->time) ?></i><br>
                            连续签到：<i><?=$v->countinously_days ?></i>天
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">连续签到排名</h2>
            </div>
            <div class="panel-body">
                <ul class="media-list registration">
                    <?php foreach($countiously_sign_in as $k => $v): ?>
                        <li class="media">
                            <div class="media-left">
                                <?=\dmstr\helpers\Html::a(\dmstr\helpers\Html::img($v->user->userInfo->getTextAvatarUrl(), ['width'=>45, 'height'=>45, 'class'=>"media-object", 'alt'=>$v->user->username]), $v->user->getMemberUrlArr(), ['rel'=>"author"]) ?>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <?=\dmstr\helpers\Html::a($v->user->username, $v->user->getMemberUrlArr(), ['rel'=>"author"]) ?>
                                    <em>NO. <i><?=$k+1 ?></i></em>
                                </div>
                                <div class="media-content">
                                    连续签到：<i><?=$v->countinously_days ?></i>天
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
