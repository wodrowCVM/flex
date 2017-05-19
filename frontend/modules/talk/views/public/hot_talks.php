<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-19
 * Time: 下午3:03
 */
/**
 * @var \common\models\Talk[] $talk
 */

$hot_talks = \common\models\Talk::find()->orderBy(['created_at' => SORT_DESC])->limit(5)->all();
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">热门说说</h2>
    </div>
    <div class="panel-body">
        <ul class="media-list media-feed feed-side">
            <?php foreach ($hot_talks as $k => $v): ?>
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
