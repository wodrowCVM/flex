<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午4:11
 *
 * @var \yii\web\View $this
 * @var boolean $is_sign_in
 */
$_date = date("Ymd", time());
$sign_in = \common\models\UserSignIn::findOne(['user_id' => Yii::$app->user->id, 'date' => $_date]);
$has_sign_in_c = \common\models\UserSignIn::find()->where(['date' => $_date])->count();
if (Yii::$app->request->isPjax) {
    if ($_REQUEST['_pjax'] == '#sign_in') {
        $trans = Yii::$app->db->beginTransaction();
        try {
            $sign_in = new \common\models\UserSignIn();
            $sign_in->user_id = Yii::$app->user->id;
            $sign_in->date = $_date;
            $sign_in->time = time();
            $yesterday_sign_in = \common\models\UserSignIn::findOne(['user_id' => Yii::$app->user->id, 'date' => $_date - 1]);
            $c = $yesterday_sign_in ? $yesterday_sign_in->countinously_days + 1 : 1;
            $sign_in->countinously_days = $c;
            if ($sign_in->save()) {
            } else {
                $sign_in = false;
            }
            $has_sign_in_c = \common\models\UserSignIn::find()->where(['date' => $_date])->count();
            $trans->commit();
        } catch (\yii\db\Exception $e) {
            $trans->rollBack();
            throw $e;
        }
    }
}
?>

<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body text-center mp0">
                <p>
                    Get Flexiable，对！没错！这里就是 Flexiable 社区，我们想做国内最好的 Flexiable 社区。
                </p>
            </div>
        </div>
        <?= $this->render('public/mem_list') ?>
    </div>
    <div class="col-md-3">
        <?php \yii\widgets\Pjax::begin(['id' => 'sign_in']) ?>
        <div class="btn-group" id="sign_in_btn_group" style="width: 100%;height: 40px;margin-bottom: 20px;">
            <?php if ($sign_in): ?>
                <?= \yii\helpers\Html::button(\kartik\icons\Icon::show('calendar-check-o') . '已连续签到' . $sign_in->countinously_days . '天', [
                    'class' => "btn",
                    'style' => [
                        'width' => '50%',
                        'height' => '100%',
                    ],
                    'disabled' => true,
                ]) ?>
            <?php else: ?>
                <?= \yii\helpers\Html::a('签到', ['index'], [
                    'id' => 'sign_in_btn',
                    'class' => "btn btn-warning",
                    'style' => [
                        'width' => '50%',
                        'height' => '100%',
                        'line-height' => "26px",
                    ],
                ]) ?>
            <?php endif; ?>
            <?= \dmstr\helpers\Html::a('今日已签到' . $has_sign_in_c . '人', ['/jour/default/today-sign-in'], ['class' => "btn btn-primary", 'style' => ['width' => "50%", 'height' => "100%", 'line-height' => "28px"]]) ?>
        </div>
        <?php \yii\widgets\Pjax::end() ?>
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
                <?php $talk_form = \kartik\widgets\ActiveForm::begin(['options' => ['data-pjax' => true], 'action' => ['/site/index', '_pjax' => '#talk']]); ?>
                <?= $talk_form->field($talk_model, 'content', [
                    'template' => '<div class="form-group input-group field-feed-content required">{input}<span class="input-group-btn">' . \dmstr\helpers\Html::submitButton('发布', ['class' => "btn btn-success", 'id' => 'index_talk_publish_button']) . '</span></div>',
                ])->textarea(['id' => "feed-content", 'class' => "form-control", 'placeholder' => "我想说..."]) ?>
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
                                                <?=\dmstr\helpers\Html::a(\kartik\icons\Icon::show('comment-o')." 0 ",['#'], []) ?>
                                                <?=\dmstr\helpers\Html::a(\kartik\icons\Icon::show('thumbs-o-up')." 0 ",['#'], []) ?>
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
                                'maxButtonCount' => 10, //控制每页显示的页数
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
    </div>
</div>

<?php \common\components\jsblock\JsBlock::begin(); ?>
<script>
    $(function () {
        var is_guest = !"<?=Yii::$app->user->id ?>";
        var login_url = "<?=\yii\helpers\Url::to(['/site/login']) ?>";
        $("#sign_in_btn").click(function () {
            if (is_guest) {
                location.href = login_url;
            }
        });
        $("#index_talk_publish_button").click(function () {
            if (is_guest) {
                location.href = login_url;
            }
        })
    })
</script>
<?php \common\components\jsblock\JsBlock::end(); ?>

