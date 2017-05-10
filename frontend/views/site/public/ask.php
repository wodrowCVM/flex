<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午3:36
 */
$_items = \common\models\Story::find()->where(['<', 'need_level', '1000'])->limit(10)->orderBy(["updated_at"=>SORT_DESC, "created_at"=>SORT_DESC])->all();
$_count = \common\models\Story::find()->where(['<', 'need_level', '1000'])->count();
?>

<div class="panel panel-default list-panel">
    <div class="panel-heading">
        <h3 class="panel-title text-center">
            经典提问&nbsp;
        </h3>
    </div>
    <div class="clearfix site-index-topic">
        <?php foreach($_items as $k => $v): ?>
            <li class="list-group-item media col-sm-12 mt0">
                <?=\yii\helpers\Html::a('<span class="badge badge-reply-count">6</span>', ['/topic/18#comment6'], [
                    'class' => 'pull-right',
                ]) ?>
                <div class="avatar pull-left">
                    <?=\yii\helpers\Html::a(\yii\helpers\Html::img($v->user->userInfo->getTextAvatarUrl()), ['#'], ["class"=>"media-objects"]) ?>
                </div>

                <div class="infos">
                    <div class="media-heading">
                        <?=\yii\helpers\Html::a($v->title, ['#'], ["title"=>$v->title]) ?>
                        <i class="fa fa-trophy excellent"></i>
                    </div>
                    <div class="media-body meta title-info">
                        <?=\yii\helpers\Html::a('瞎扯淡', ['#'], ["class"=>"node"]) ?>
                        •
                        <?=\yii\helpers\Html::a($v->user->username, ['#'], []) ?>
                        •
                        <span><?=date("Y-m-d", $v->created_at) ?></span>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </div>

    <div class="panel-footer text-right">
            <span class="index_count">
                <i class="fa fa-list"></i> 主题数：<?=$_count ?>
            </span>
        <?=\yii\helpers\Html::a('发表文章', '/user/story/publish', [
            'class' => 'btn btn-success',
            'style' => [
                'padding' => 0,
                'font-size' => "10px",
            ],
        ]) ?>
        <?=\yii\helpers\Html::a('查看更多文章', ['/story'], [
            'class' => 'btn btn-info',
            'style' => [
                'padding' => 0,
                'font-size' => "10px",
            ],
        ]) ?>
    </div>
</div>
