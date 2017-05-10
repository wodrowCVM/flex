<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午3:56
 */
$users = \common\models\User::find()->limit(36)->all();
?>

<div class="panel panel-default list-panel">
    <div class="panel-heading">
        <h3 class="panel-title text-center">会员榜</h3>
    </div>

    <div class="panel-body row hidden-xs" style="height: 420px;">
        <?php foreach ($users as $k => $v): ?>
            <div class="col-xs-2" style="min-width: 80px;">
                <div class="media user-card">
                    <div class="media-left">
                        <a href="/member/wodrow"
                           title="<?= $v->username ?>"><?= \yii\helpers\Html::img($v->userInfo->textAvatarUrl, [
                                'width' => 50,
                                'height' => 50,
                            ]) ?></a></div>
                    <div class="media-body hidden-xs">
                        <div class="media-heading">
                            <a href="/member/wodrow" title="<?= $v->username ?>"><?= $v->username ?></a></div>
                        <div class="">
                            积分：0
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
