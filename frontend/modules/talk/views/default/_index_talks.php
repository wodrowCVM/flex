<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-22
 * Time: 下午1:37
 */
/**
 * @var \common\models\Talk[] $talks
 * @var \common\models\TalkReply $talk_reply
 */
?>

    <ul class="media-list feed-list">
        <?php foreach ($talks as $k => $talk): ?>
            <li class="media" data-key="<?= $talk->id ?>">
                <div class="media-left">
                    <?= \dmstr\helpers\Html::a(\dmstr\helpers\Html::img($talk->createdBy->userInfo->getTextAvatarUrl(), ['width' => 50, 'height' => 50, 'class' => "media-object"]), $talk->createdBy->getMemberUrlArr(), ['rel' => "author", 'alt' => $talk->createdBy->username]) ?>
                </div>
                <div class="media-body">
                    <div class="media-content">
                        <?= \dmstr\helpers\Html::a($talk->createdBy->username, $talk->createdBy->getMemberUrlArr(), ['rel' => "author",]) ?>
                        : <?= $talk->content ?>
                    </div>
                    <div class="media-action">
                        <span><?= date("Y-m-d H:i:s", $talk->created_at) ?></span>
                        <span class="pull-right">
                                    <?= \dmstr\helpers\Html::a('查看', $talk->getUrlArr(), ['class' => "btn btn-xs btn-info"]) ?>
                                    <?= \dmstr\helpers\Html::button('快速回复', ['class' => 'btn btn-xs quick_talk_reply_btn', 'data-talk_id'=>$talk->id]) ?>
                                    <?= $this->render('//public/_show_talk_praise_icon', ['talk' => $talk]) ?>
                                </span>
                    </div>
                    <?= $this->render('_ups', ['talk' => $talk]) ?>
                    <div class="hint">共
                        <em><?= \common\models\TalkReply::find()->where(['talk_id' => $talk->id])->count() ?></em>
                        条回复
                    </div>
                    <div class="quick_talk_reply">
                        <?php // echo$this->render('/public/quick_reply', ['talk_reply'=>$talk_reply]) ?>
                    </div>
                    <?php foreach ($talk->last10TalkReplies as $k1 => $v1): ?>
                        <div class="media">
                            <div class="media-left">
                                <?= \dmstr\helpers\Html::a(\dmstr\helpers\Html::img($v1->createdBy->userInfo->getTextAvatarUrl(), ['width' => 40, 'height' => 40, 'class' => "media-object"]), $v1->createdBy->getMemberUrlArr(), ['rel' => "author", 'alt' => $v1->createdBy->username]) ?>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <?= \dmstr\helpers\Html::a($v1->createdBy->username, $v1->createdBy->getMemberUrlArr(), ['rel' => "author",]) ?>
                                    <?php if ($v1->at_user): ?>
                                        @<a href="<?= $v1->atUser->getMemberUrl() ?>"
                                            rel="author"><?= $v1->atUser->username ?></a>
                                    <?php endif; ?>
                                    :
                                    <?= $v1->content ?>
                                </div>
                                <div class="media-action">
                                    <span><?= date("Y-m-d H:i:s", $v1->created_at) ?></span>
                                    <span class="pull-right">
                            <?= \dmstr\helpers\Html::button('快速回复', ['class' => 'btn btn-xs quick_talk_reply_btn', 'data-talk_id'=>$talk->id, 'data-at_user'=>$v1->created_by]) ?>
                </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </li>
        <?php endforeach; ?>
    </ul>

<?php \common\components\jsblock\JsBlock::begin(); ?>
    <script>
        $(function () {
            $("button.quick_talk_reply_btn").click(function () {
                $('.quick_talk_reply').find('form').remove();
                var url = "<?=\yii\helpers\Url::to('/talk/default/index') ?>";
                var talk_id = $(this).data('talk_id');
                var at_user = $(this).data('at_user');
                var li = $(this).parents('li');
                $.ajax({
                    url:url,
                    type:'post',
                    data:{talk_id:talk_id, at_user:at_user, action:'reply'},
                    success:function (msg) {
                        li.find('.quick_talk_reply').html(msg);
                    }
                })
            })
            $(".feed-list").on('click', ".quick_talk_reply_submit", function () {
                if($("#talkreply-content").val()==''){
                    $(".field-talkreply-content").addClass('error');
                    return false;
                }
            })
        })
    </script>
<?php \common\components\jsblock\JsBlock::end(); ?>