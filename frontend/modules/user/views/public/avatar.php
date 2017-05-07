<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午5:49
 */
?>

<div class="panel panel-default thumbnail center">
    <div class="panel-body">
        <div class="media">
            <div class="media-left media-middle">
                <img class="media-object"
                     src="https://getyii.com/uploads/avatars/cache/100_p4NoozEhjVx3DI-vkkb3mWHSeMd0qQ9t.png" alt="">
            </div>
            <div class="media-body">
                <h2 class="mt5"><strong><?= Yii::$app->user->identity->username ?></strong></h2>
                <p>第 <?= Yii::$app->user->identity->id ?> 位会员</p>
                <div class="pull-left">
                    <span class="label label-info role"><?=Yii::$app->user->identity->userInfo->levelRule->name ?></span>
                </div>
            </div>
        </div>

        <div class="follow-info row">
            <div class="col-sm-4 followers" data-login="rei">
                <a class="counter" href="/member/wodrow/point"><?=Yii::$app->user->identity->userInfo->level ?></a>
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
            <div class="col-sm-4 following">
                <a class="counter" href="#"><?=Yii::$app->user->identity->userInfo->integral ?></a>
                <a class="text" href="#">积分</a>
            </div>
            <div class="col-sm-4 stars">
                <a class="counter" href="#"><?=Yii::$app->user->identity->userInfo->treasure ?></a>
                <a class="text" href="#">财富</a>
            </div>
        </div>
        <!-- <button type="button" class="btn btn-success">Book me!</button> -->
        <!-- <button type="button" class="btn btn-info">Send me a message</button> -->
        <!-- <br> -->
    </div>


</div>
