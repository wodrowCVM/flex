<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午5:49
 */
$user = Yii::$app->user->identity;
$is_you = !Yii::$app->user->isGuest;
if ($member_id = Yii::$app->request->get('member-id')){
    $user = \common\models\User::findOne(['id'=>$member_id]);
    $is_you = Yii::$app->user->id == $member_id;
}
?>

<div class="panel panel-default thumbnail center">
    <div class="panel-body">
        <div class="media">
            <div class="media-left media-middle">
                <?=\yii\helpers\Html::img($user->userInfo->textAvatarUrl, [
                    'class'=>"media-object",
                    'width'=>100,
                    'height'=>100,
                ]) ?>
            </div>
            <div class="media-body">
                <h2 class="mt5"><strong><?= \yii\helpers\Html::a($user->username, !$is_you?$user->getMemberUrl():["/user"], [
                        'style'=>[
                            'text-decoration'=>'none',
                        ],
                        ]) ?></strong></h2>
                <p>
                    <?php if(!$is_you): ?>
                        <?php if(\common\models\Fans::findOne(['at_user'=>$member_id, 'follower'=>Yii::$app->user->id])): ?>
                            <?=\yii\helpers\Html::a('已关注', ['#'], ['class'=>"btn btn-default btn-xs", 'disabled'=>'disabled']) ?>
                            <?=\yii\helpers\Html::a('取消关注', ['/user/default/att', 'follower'=>Yii::$app->user->id, 'at_user'=>$member_id, 'undo'=>1], ['class'=>"btn btn-warning btn-xs"]) ?>
                            <?php else: ?>
                            <?=\yii\helpers\Html::a('关注', ['/user/default/att', 'follower'=>Yii::$app->user->id, 'at_user'=>$member_id], ['class'=>"btn btn-success btn-xs"]) ?>
                        <?php endif; ?>
                        <?php else: ?>
                        第<?=$user->id ?>位会员
                    <?php endif; ?>
                </p>
                <div class="pull-left">
                    <span class="label label-info role"><?=$user->userInfo->levelRule->name ?></span>
                </div>
            </div>
        </div>

        <div class="follow-info row">
            <div class="col-xs-4 followers" data-login="rei">
                <a class="counter" href="/member/wodrow/point"><?=$user->userInfo->level ?></a>
                <a class="text" href="/member/wodrow/point">等级</a>
            </div>
<!--            <div class="col-sm-4 following">-->
<!--                <a class="counter" href="#">0</a>-->
<!--                <a class="text" href="#">赞</a>-->
<!--            </div>-->
<!--            <div class="col-sm-4 stars">-->
<!--                <a class="counter" href="#">0</a>-->
<!--                <a class="text" href="#">感谢</a>-->
<!--            </div>-->
            <div class="col-xs-4 following">
                <a class="counter" href="#"><?=$user->userInfo->integral ?></a>
                <a class="text" href="#">积分</a>
            </div>
            <div class="col-xs-4 stars">
                <a class="counter" href="#"><?=$user->userInfo->treasure ?></a>
                <a class="text" href="#">财富</a>
            </div>
        </div>
        <!-- <button type="button" class="btn btn-success">Book me!</button> -->
        <!-- <button type="button" class="btn btn-info">Send me a message</button> -->
        <!-- <br> -->
    </div>


</div>
