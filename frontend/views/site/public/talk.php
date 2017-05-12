<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">
            <i class="fa fa-commenting-o"></i>
            大家正在说
            <i class="fa fa-ellipsis-h"></i>
        </h2>
        <span class="pull-right">
            <?= \dmstr\helpers\Html::a('更多»', ['/talk'], ['class' => "btn btn-xs"]) ?>
        </span>
    </div>
    <div class="panel-body">
        <?php \yii\widgets\Pjax::begin(['id' => 'talk']); ?>
        <?php $talk_form = \kartik\widgets\ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>
            <?= $talk_form->field($talk_model, 'content', [
                'template' => '<div class="form-group input-group field-feed-content required">{input}<span class="input-group-btn">'.\dmstr\helpers\Html::submitButton('发布', ['class'=>"btn btn-success"]).'</span></div>',
            ])->textarea(['id' => "feed-content", 'class' => "form-control", 'placeholder'=>"我想说..."]) ?>
        <?php \kartik\widgets\ActiveForm::end(); ?>
        <?php // \yii\widgets\Pjax::end(); ?>
        <?php // \yii\widgets\Pjax::begin(['id' => 'talk_list']); ?>
        <div class="feed">
            <div class="nano has-scrollbar">
                <ul id="w1" class="media-list nano-content" tabindex="0" style="right: -15px;">
                    <?php foreach ($talks as $k => $v): ?>
                        <li class="media" data-key="<?= $v->id ?>">
                            <div class="media-left">
                                <?= \dmstr\helpers\Html::a(\dmstr\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(), ['width' => 60, 'height' => 60]), $v->createdBy->getMemberUrlArr(), ['class' => "media-object", 'rel' => "author"]) ?>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <?= \dmstr\helpers\Html::a($v->createdBy->username, $v->createdBy->getMemberUrlArr(), ['rel' => "author"]) ?>
                                    :
                                    <?= $v->content ?>
                                </div>
                                <div class="media-action">
                                    <span class="time"><?php
                                        $x = time() - $v->created_at;
                                        if ($x < 60) {
                                            echo $x . "秒前";
                                        }
                                        if ($x >= 60 && $x < 3600) {
                                            $y = (int)($x / 60);
                                            echo $y . "分钟前";
                                        }
                                        if ($x >= 3600 && $x < 86400) {
                                            $y = (int)($x / 3600) . "小时前";
                                        }
                                        if ($x >= 86400) {
                                            echo date("Y-m-d", $v->created_at);
                                        }
                                        ?></span>
                                    <span class="pull-right">
                                        <a href="/feed/22310">
                                            <i class="fa fa-comment-o"></i>
                                            0
                                        </a>
                                        <a class="vote up" href="javascript:void(0);" title="" data-type="feed"
                                           data-id="22310" data-toggle="tooltip" data-original-title="顶">
                                            <i class="fa fa-thumbs-o-up"></i>
                                            1
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <?php
                    echo \yii\widgets\LinkPager::widget([
                        'pagination' => $talk_pages,
                        'firstPageLabel' => '首页',
                        'lastPageLabel' => '尾页',
                        'prevPageLabel' => '上一页',
                        'nextPageLabel' => '下一页',
                        'maxButtonCount' => 5, //控制每页显示的页数
                        'options' => ['data-pjax' => "#talk", 'class'=>"pagination"],
                    ]);
                    ?>
                </ul>
                <div class="nano-pane">
                    <div class="nano-slider" style="height: 56px; transform: translate(0px, 0px);"></div>
                </div>
            </div>
        </div>
        <?php \yii\widgets\Pjax::end(); ?>
    </div>
</div>

