<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午3:36
 */
/**
 * @var \common\models\PosterSubject[] $_items
 */
$_items = \common\models\PosterSubject::find()->limit(10)->orderBy(["updated_at"=>SORT_DESC, "created_at"=>SORT_DESC])->all();
$_count = \common\models\PosterSubject::find()->count();
?>

<div class="panel panel-default list-panel">
    <div class="panel-heading">
        <h3 class="panel-title text-center">
            <?=\kartik\icons\Icon::show('book') ?>
            帖子主题
        </h3>
    </div>
    <div class="clearfix site-index-topic">
        <?php foreach($_items as $k => $v): ?>
            <li class="list-group-item media col-sm-12 mt0">
                <?=\yii\helpers\Html::a('<span class="badge badge-reply-count">'.$v->getPosterCount().'</span>', $v->getUrlArr(), [
                    'class' => 'pull-right',
                ]) ?>
                <div class="avatar pull-left">
                    <?=\yii\helpers\Html::a(\yii\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(),['style'=>['width'=>"50px", 'height'=>"50px"]]), $v->createdBy->getMemberUrlArr(), ["class"=>"media-objects"]) ?>
                </div>

                <div class="infos">
                    <div class="media-heading" style="height: 20px;margin-bottom: 12px !important;">
                        <?php echo \yii\helpers\Html::a($v->title, $v->getUrlArr(), ["title"=>$v->title]) ?>
                        <i class="fa fa-trophy excellent"></i>
                    </div>
                    <div class="media-body meta title-info">
                        <?php // echo \yii\helpers\Html::a($v->tagArr[0], ['#'], ["class"=>"node"]) ?>
                        •
                        <?=\yii\helpers\Html::a($v->createdBy->username, $v->createdBy->getMemberUrlArr(), []) ?>
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
        <?=\yii\helpers\Html::a('发表主题贴', '/user/poster/create-subject', [
            'class' => 'btn btn-success',
            'style' => [
                'padding' => 0,
                'font-size' => "10px",
            ],
        ]) ?>
        <?=\yii\helpers\Html::a('查看更多主题贴', ['/poster'], [
            'class' => 'btn btn-info',
            'style' => [
                'padding' => 0,
                'font-size' => "10px",
            ],
        ]) ?>
    </div>
</div>
