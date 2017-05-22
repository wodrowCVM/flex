<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-22
 * Time: 下午1:39
 */

/**
 * @var \common\models\Talk $talk
 */
?>

<?php // \yii\widgets\Pjax::begin(['options'=>['id' => 'talk_'.$talk->id]]); ?>

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
                                    <?= \dmstr\helpers\Html::a('查看', $talk->getUrlArr(), ['class' => ""]) ?>
                                    <?= \dmstr\helpers\Html::a('快速回复', ['#'], ['class' => "reply",]) ?>
                                    <?= $this->render('//public/_show_talk_praise_icon', ['talk' => $talk]) ?>
                                </span>
        </div>

        <?php \yii\widgets\Pjax::begin(['id' => '#member_talk_praise_'.$talk->id]); ?>
        <div class="ups">
            <?=\dmstr\helpers\Html::a('test', ['', '_pjax'=>'#member_talk_praise_'.$talk->id, 'praise_talk_id'=>$talk->id]) ?>
            <?php $praises = \common\models\TalkPraise::find()->where(['talk_id' => $talk->id])->limit(10)->all(); ?>
            <?php foreach ($praises as $k2 => $v2): ?>
                <a href="<?= $v2->createdBy->getMemberUrl() ?>" rel="author"><?= $v2->createdBy->username ?></a> ,
            <?php endforeach; ?>
            <?php if ($praises): ?>
                觉得很赞
            <?php endif; ?>
        </div>
        <?php \yii\widgets\Pjax::end(); ?>

        <div class="hint">共 <em><?= \common\models\TalkReply::find()->where(['talk_id' => $talk->id])->count() ?></em>
            条回复
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
                            @<a href="<?= $v1->atUser->getMemberUrl() ?>" rel="author"><?= $v1->atUser->username ?></a>
                        <?php endif; ?>
                        :
                        <?= $v1->content ?>
                    </div>
                    <div class="media-action">
                        <span><?= date("Y-m-d H:i:s", $v1->created_at) ?></span>
                        <span class="pull-right">
                            <a class="reply" href="javascript:void(0);"><i class="fa fa-reply"></i> 快速回复</a>
                </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</li>

<?php // \yii\widgets\Pjax::end(); ?>
