<?php
/**
 * @var \common\models\Talk $talk
 * @var \yii\data\Pagination $pages
 */

$this->title = "说说";
$this->params['breadcrumbs'][] = $this->title;

$x_talks = \common\models\Talk::find()->orderBy(['created_at' => SORT_DESC])->limit(5)->all();
?>

<div class="talk-default-index">
    <div class="row">
        <div class="col-lg-9">
            <div class="page-header">
                <h1><?= $this->title ?></h1>
            </div>
            <ul class="media-list feed-list">
                <?php foreach ($talks as $k => $v): ?>
                    <li class="media" data-key="<?= $v->id ?>">
                        <div class="media-left">
                            <?= \dmstr\helpers\Html::a(\dmstr\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(), ['width' => 50, 'height' => 50, 'class' => "media-object"]), $v->createdBy->getMemberUrlArr(), ['rel' => "author", 'alt' => $v->createdBy->username]) ?>
                        </div>
                        <div class="media-body">
                            <div class="media-content">
                                <?= \dmstr\helpers\Html::a($v->createdBy->username, $v->createdBy->getMemberUrlArr(), ['rel' => "author",]) ?>
                                : <?= $v->content ?>
                            </div>
                            <div class="media-action">
                                <span><?= date("Y-m-d H:i:s", $v->created_at) ?></span>
                                <span class="pull-right">
                        <a class="reply" href="javascript:void(0);"><i class="fa fa-reply"></i> 回复</a>
            <a class="vote up" href="javascript:void(0);" title="" data-type="feed" data-id="22652"
               data-toggle="tooltip" data-original-title="顶"><i class="fa fa-thumbs-o-up"></i> 0</a>        </span>
                            </div>
                        </div>

                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
                'firstPageLabel' => '首页',
                'lastPageLabel' => '尾页',
                'prevPageLabel' => '上一页',
                'nextPageLabel' => '下一页',
                'maxButtonCount' => 10, //控制每页显示的页数
            ]);
            ?>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">精品说说</h2>
                </div>
                <div class="panel-body">
                    <ul class="media-list media-feed feed-side">
                        <?php foreach ($x_talks as $k => $v): ?>
                            <li class="media">
                                <div class="media-left">
                                    <?= \dmstr\helpers\Html::a(\dmstr\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(), ['width' => 40, 'height' => 40, 'class' => "media-object"]), $v->createdBy->getMemberUrlArr(), ['rel' => "author", 'alt' => $v->createdBy->username]) ?>
                                </div>
                                <div class="media-body">
                                    <div class="media-content">
                                        <?= \dmstr\helpers\Html::a($v->createdBy->username, $v->createdBy->getMemberUrlArr(), ['rel' => "author",]) ?>
                                        : <?= $v->content ?>
                                    </div>
                                    <div class="media-action">
                                        <?=date("Y-m-d H:i:s", $v->created_at) ?>
                                        <span class="pull-right">
                                    <a href="/feed/22584"><i class="fa fa-comment-o"></i> 6</a>                                    <a
                                                class="vote up" href="javascript:void(0);" title="" data-type="feed"
                                                data-id="22584" data-toggle="tooltip" data-original-title="顶"><i
                                                    class="fa fa-thumbs-o-up"></i> 0</a>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">热门说说</h2>
                </div>
                <div class="panel-body">
                    <ul class="media-list media-feed feed-side">
                        <?php foreach ($x_talks as $k => $v): ?>
                            <li class="media">
                                <div class="media-left">
                                    <?= \dmstr\helpers\Html::a(\dmstr\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(), ['width' => 40, 'height' => 40, 'class' => "media-object"]), $v->createdBy->getMemberUrlArr(), ['rel' => "author", 'alt' => $v->createdBy->username]) ?>
                                </div>
                                <div class="media-body">
                                    <div class="media-content">
                                        <?= \dmstr\helpers\Html::a($v->createdBy->username, $v->createdBy->getMemberUrlArr(), ['rel' => "author",]) ?>
                                        : <?= $v->content ?>
                                    </div>
                                    <div class="media-action">
                                        <?=date("Y-m-d H:i:s", $v->created_at) ?>
                                        <span class="pull-right">
                                    <a href="/feed/22584"><i class="fa fa-comment-o"></i> 6</a>                                    <a
                                                class="vote up" href="javascript:void(0);" title="" data-type="feed"
                                                data-id="22584" data-toggle="tooltip" data-original-title="顶"><i
                                                    class="fa fa-thumbs-o-up"></i> 0</a>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
