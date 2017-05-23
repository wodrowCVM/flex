<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-19
 * Time: 下午2:30
 */
/**
 * @var \common\models\Talk $talk
 * @var \common\models\TalkReply $talk_reply
 * @var \common\models\TalkReply[] $talk_replys
 */
$this->title = "说说详细";
$this->params['breadcrumbs'][] = \dmstr\helpers\Html::a('所有说说', ['/talk/default/index']);
$this->params['breadcrumbs'][] = $this->title;
$reply_count = \common\models\TalkReply::find()->where(['talk_id'=>$talk->id])->count();
?>

<div class="talk-default-view">
    <div class="row">
        <div class="col-lg-9">
            <div class="page-header">
                <h1><?=$this->title ?></h1>
            </div>

            <div class="action" style="padding: 10px;">
                <span><i class="fa fa-user"></i><?=$talk->createdBy->username ?></span>
                <span><i class="fa fa-clock-o"></i><?=date("Y-m-d", $talk->created_at) ?></span>
                <span><i class="fa fa-eye"></i><?=$talk->view_count ?></span>
                <span><i class="fa fa-comments-o"></i><?=$reply_count ?></span>
<!--                <span class="pull-right"><a class="vote up" href="javascript:void(0);" title="" data-type="feed" data-id="22668" data-toggle="tooltip" data-original-title="顶"><i class="fa fa-thumbs-o-up"></i> 0</a><a class="vote down" href="javascript:void(0);" title="" data-type="feed" data-id="22668" data-toggle="tooltip" data-original-title="踩"><i class="fa fa-thumbs-o-down"></i> 0</a></span>-->
            </div>
            <div class="col-lg-12 content" style="margin-bottom: 10px;">
                <?=$talk->content ?>
            </div>
            <?php //echo $this->render("//public/share") ?>
            <div id="replies">
                <div class="page-header">
                    <h2>共 <em><?=$reply_count ?></em> 条回复</h2>
                    <ul id="w0" class="nav nav-tabs nav-sub">
                        <li class="active"><a href="#">最后回复</a></li>
                    </ul>
                </div>
                <ul class="media-list">
                    <?php foreach($talk_replys as $k => $v): ?>
                        <li class="media" data-key="<?=$v->id ?>">
                            <div class="media-left">
                                <?= \dmstr\helpers\Html::a(\dmstr\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(), ['width' => 50, 'height' => 50, 'class' => "media-object"]), $v->createdBy->getMemberUrlArr(), ['rel' => "author", 'alt' => $v->createdBy->username]) ?>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <?= \dmstr\helpers\Html::a($v->createdBy->username, $v->createdBy->getMemberUrlArr(), ['rel' => "author",]) ?>
                                    <?php if($v->at_user): ?>
                                        @<a href="<?=$v->atUser->getMemberUrl() ?>" rel="author"><?=$v->atUser->username ?></a>
                                    <?php endif; ?>
                                    发布于 <?=date("Y-m-d H:i:s", $v->created_at) ?>
                                    <span class="pull-right">
                                        <span class="label label-default talk_reply_btn" style="cursor: pointer;" data-at_user="<?=$v->createdBy->id ?>" data-at_user_name="<?=$v->createdBy->username ?>">回复</span>
                                    </span>
                                </div>
                                <?=$v->content ?>
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

            <div id="reply">
                <div class="page-header">
                    <h2>回复说说</h2>
                </div>
                <?php $form = \yii\bootstrap\ActiveForm::begin(['options' => [
                    'id' => 'talk_reply_form',
                ]]); ?>
                <div class="hidden">
                    <?=$form->field($talk_reply, 'at_user', [
                        'options' => [
                            'id' => 'talk_reply_at_user_field',
                        ]
                    ])->textInput() ?>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div id="talk_reply_at_user_name_field" class="field-talkreply-at_user">
                        <div class="input-group form-group"><span class="input-group-addon">@</span><input type="text" class="form-control" readonly="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                <?=$form->field($talk_reply, 'content')->textarea()->label(false) ?>
                <?=\dmstr\helpers\Html::submitButton('回复', ['class'=>'btn btn-primary']) ?>
                <?=\dmstr\helpers\Html::resetButton('清空', ['class'=>'btn']) ?>
                </div>
                <?php \yii\bootstrap\ActiveForm::end(); ?>
            </div>
        </div>

        <div class="col-lg-3">
            <?=$this->render('/public/top_talks') ?>
            <?=$this->render('/public/hot_talks') ?>
        </div>
    </div>
</div>

<?php \common\components\jsblock\JsBlock::begin(); ?>
    <script>
        $(function () {
            $(".talk_reply_btn").on('click', function () {
                var at_user = $(this).data('at_user');
                var at_user_name = $(this).data('at_user_name');
                $("#talk_reply_at_user_field").find('input').val(at_user);
                $("#talk_reply_at_user_name_field").find('input').val(at_user_name);
                location.href = "#talk_reply_form";
            })
        })
    </script>
<?php \common\components\jsblock\JsBlock::end(); ?>