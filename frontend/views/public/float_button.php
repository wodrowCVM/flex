<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午9:03
 */
?>

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
