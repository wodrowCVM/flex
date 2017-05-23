<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-10
 * Time: 下午5:30
 */

/**
 * @var \frontend\modules\story\models\Story $story
 * @var \common\models\StoryRelpy $story_reply
 */
$this->title = $story->title;
$this->params['breadcrumbs'][] = \dmstr\helpers\Html::a('文章列表',['/story/default/index']);
$this->params['breadcrumbs'][] = $this->title;
?>

<?php \yii\widgets\Pjax::begin(['id' => 'story_default_view']); ?>

<div class="row">
    <div class="col-md-9">
        <div class="article-detail">
            <div class="article-top">
                <div class="article-title"><h3><?= $story->title ?></h3></div>
                <div class="article-tag">
                    <span class="glyphicon glyphicon-calendar"></span>
                    发布日期： <?= date("Y-m-d H:i:s", $story->created_at) ?>
                    <!--<span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>
                    分类：
                    <a href="/category/other.html">其他</a>-->
                    <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>
                    热度：
                    <?=$story->view_count ?>°C
                    <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                    评论：
                    <?=\common\models\StoryReply::find()->where(['story_id'=>$story->id])->count() ?>
                    <span class="glyphicon glyphicon-tags" style="margin-left:15px;"></span>
                    标签：
                    <a href="/tag/117.html"><span class="label label-default label-fix">dns</span></a>
                </div>
                <div class="article-notice">
                    <p><span class="glyphicon glyphicon-pushpin"></span>&nbsp;提示：转载请注明原文链接</p>
                    <p><span class="glyphicon glyphicon-pushpin"></span>
                        本文永久链接：
                        <?=\yii\helpers\Html::a($_SERVER['HTTP_HOST'].$story->getUrl(), $story->getUrlArr()) ?>
                    </p>
                </div>
            </div>
            <div class="articlt-boby"><?= $story->content ?></div>
        </div>

        <div class="panel panel-default guestbook">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;评论
            </div>
            <div class="panel-body">
                <div class="comment-list">
                    <?php foreach($story_replys as $k => $v): ?>
                        <div class="comment">
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="comment-head">
                                        <?= \dmstr\helpers\Html::a(\dmstr\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(), ['width' => 50, 'height' => 50, 'class' => "media-object"]), $v->createdBy->getMemberUrlArr(), ['rel' => "author", 'alt' => $v->createdBy->username]) ?>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="comment-title"><span class="username">
                                            <?= \dmstr\helpers\Html::a($v->createdBy->username, $v->createdBy->getMemberUrlArr(), ['rel' => "author",]) ?>
                                        </span>&nbsp;<small><?=date("Y-m-d H:i:s", $v->created_at) ?></small></div>
                                    <div class="comment-content">
                                        <?=$v->content ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
                <div class="row">
                    <?php $form = \kartik\widgets\ActiveForm::begin(['id' => "comment-form", 'options' => ['data-pjax'=>false]]); ?>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-4 hidden">
                                <?=$form->field($story_reply, 'at_user', [
                                    'template'=>'<div class="input-group form-group"><span class="input-group-addon">@</span>{input}</div>',
                                ])->textInput(['style'=>['background-image' => 'url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/ il8IalkCLBfNVAAAAABJRU5ErkJggg=="); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;'],'readonly'=>'true'])->label(false) ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?=$form->field($story_reply, 'content', ['options' => [],])->textarea(['rows'=>5])->label(false) ?>
                                </div>
                                <div class="notice">最多500个字符</div>
                            </div>
                            <div class="col-md-12">
                                <?=\dmstr\helpers\Html::submitButton('发表',['class'=>"btn btn-default", 'data-loading-text'=>"提交中..."]) ?>
                                <?=\dmstr\helpers\Html::resetButton('重置',['class'=>"btn btn-default",]) ?>
                            </div>
                        </div>
                    </div>
                    <?php \kartik\widgets\ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 visible-lg-block">
        <div id="article-sidebar" class="article-sidebar affix-top">
            <?=$this->render('/public/hot_story') ?>
        </div>
    </div>
</div>

<?php \yii\widgets\Pjax::end(); ?>