<?php
/**
 * @var \common\models\PosterSubject[] $subjects
 */

$this->title = "所有主题";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-9 topic">
        <div class="panel panel-default" style="margin-bottom: 0px;">
            <div class="panel-heading clearfix children">
                <?= $this->title ?>
            </div>
            <div>
                <?php foreach ($subjects as $k => $v): ?>
                    <div class="list-group" style="margin-bottom: 0px;">
                        <div class="list-group-item" data-key="44">
                            <div class="media">
                                <div class="pull-right">
                                    <?php if($v->created_by == Yii::$app->user->id || Yii::$app->user->id == \common\config\ConfigData::getSuper()->id): ?>
                                        <?=\yii\helpers\Html::a('修改', ['/user/poster/update-subject', 'subject_id'=>$v->id]) ?>
                                    <?php endif; ?>
                                    <?php if($v->is_top == $v::IS_TOP_TRUE): ?>
                                        <span class="label label-danger"><?=$v::getIsTop()[$v->is_top] ?></span>
                                    <?php endif; ?>
                                    <?php if($v->type != $v::TYPE_DEFAULT): ?>
                                        <span class="label label-primary"><?=$v::getType()[$v->type] ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="media-left">
                                    <?= \yii\helpers\Html::a(\yii\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(), ['style' => ['width' => "50px", 'height' => "50px"], 'class' => "media-object"]), $v->createdBy->getMemberUrlArr(), []) ?>
                                </div>
                                <div class="media-body">

                                    <div class="media-heading title">
                                        <?= \yii\helpers\Html::a($v->title . "集", $v->getUrlArr(), ['title' => $v->title]) ?>
                                        <i class="fa fa-trophy excellent"></i>
                                    </div>

                                    <div class="title-info">
                                        <span>
                                            创建时间 <small><?=date("Y-m-d H:i:s", $v->created_at) ?></small>
                                        </span>
                                        <?php if ($v->posterCount == 0): ?>
                                            <span>暂无帖子</span>
                                        <?php else: ?>
                                            <span>
                                            最后由
                                            <a href="<?= $v->lastPoster->createdBy->getMemberUrl() ?>"><strong> <?= $v->lastPoster->createdBy->username ?> </strong></a>
                                            于 <small><?= date("Y-m-d H:m:s", $v->lastPoster->created_at) ?></small> 发帖
                                        </span>
                                            •
                                            <code><?= $v->posterCount ?></code>个帖子
                                            •
                                            <code><?= $v->posterUserCount ?></code>个发帖人
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
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

    </div>
    <div class="col-md-3 side-bar p0">

        <div class="">

            <div class="panel panel-default corner-radius">


                <div class="panel-body text-center">
                    <div class="btn-group">
                        <?= \dmstr\helpers\Html::a('创建新主题', ['/user/poster/create-subject'], ['class' => "btn btn-primary"]) ?>
                    </div>
                </div>
            </div>

            <div class="panel panel-default corner-radius">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">小贴士</h3>
                </div>
                <div class="panel-body">
                    <p>在使用 composer 的时候 后面加上 <code>-vvv</code> 就可以看到详情了</p>
                </div>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>

</div>