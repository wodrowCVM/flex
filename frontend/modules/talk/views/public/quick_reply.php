<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午1:03
 */
/**
 * @var \common\models\TalkReply $talk_reply
 * @var User $at_user
 */
?>

<?php $form = \kartik\widgets\ActiveForm::begin(['options' => ['data-pjax' => true], 'action' => ['/talk/default/index', '_pjax' => '#talk_default_index', 'page'=>Yii::$app->request->get('page'), 'per-page'=>Yii::$app->request->get('per-page')]]); ?>
<?php $talk_reply->talk_id = $talk_id; ?>
<?=$form->field($talk_reply, 'talk_id')->hiddenInput()->label(false) ?>
<?php if(isset($at_user)): ?>
    <?php $talk_reply->at_user = $at_user->id; ?>
    <?=$form->field($talk_reply, 'at_user')->hiddenInput()->label(false) ?>
    <div class="col-sm-3 col-xs-6" style="padding: 0">
        <div>
            <div class="input-group form-group"><span class="input-group-addon">@</span><input type="text" class="form-control" readonly="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" value="<?=$at_user->username ?>"></div>
        </div>
    </div>
<?php endif; ?>
<?=$form->field($talk_reply, 'content')->textarea()->label(false) ?>
<?=\dmstr\helpers\Html::submitButton('提交', ['class'=>'btn btn-xs btn-primary quick_talk_reply_submit']) ?>
<?php \kartik\widgets\ActiveForm::end(); ?>
