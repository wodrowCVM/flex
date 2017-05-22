<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-22
 * Time: 下午2:05
 */
/**
 * @var \common\models\Talk $talk
 */
?>

<li class="media">
    <div class="media-left">
        <?= \dmstr\helpers\Html::a(\dmstr\helpers\Html::img($talk->createdBy->userInfo->getTextAvatarUrl(), ['width' => 40, 'height' => 40, 'class' => "media-object"]), $talk->createdBy->getMemberUrlArr(), ['rel' => "author", 'alt' => $talk->createdBy->username]) ?>
    </div>
    <div class="media-body">
        <div class="media-content">
            <?= \dmstr\helpers\Html::a($talk->createdBy->username, $talk->createdBy->getMemberUrlArr(), ['rel' => "author",]) ?>
            : <?= $talk->content ?>
        </div>
        <div class="media-action">
            <?=date("Y-m-d H:i:s", $talk->created_at) ?>
            <span class="pull-right">
                        <a href="<?=$talk->getUrl() ?>"><i class="fa fa-comment-o"></i> <?=\common\models\TalkReply::find()->where(['talk_id'=>$talk->id])->count() ?></a>
                <?=$this->render('//public/_show_talk_praise_icon', ['talk'=>$talk]) ?>
                    </span>
        </div>
    </div>
</li>