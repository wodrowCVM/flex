<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 下午12:58
 */
/**
 * @var \frontend\modules\user\models\Poster $poster
 */
?>

<div class="user-poster-_poster_form">
    <?php $form = \kartik\widgets\ActiveForm::begin(); ?>
    <?php
    $initValue = empty($poster->poster_subject_id) ? '' : \common\models\PosterSubject::findOne($poster->poster_subject_id)->title;
    ?>
    <?=$form->field($poster, 'poster_subject_id')->widget(\kartik\widgets\Select2::className(), [
//        'data' => $poster->poster_subject_id,
        'initValueText' => $initValue,
        'language' => Yii::$app->language,
        'options' => ['placeholder' => '请选择或输入'],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10,
            'allowClear' => true,
            'language' => [
                'errorLoading' => new \yii\web\JsExpression("function () { return '等待结果'; }"),
            ],
            'ajax' => [
                'url' => \yii\helpers\Url::to(['/site/poster-subject-search']),
                'dataType' => 'json',
                'data' => new \yii\web\JsExpression('function(params) { return {name:params.term}; }')
            ],
            'escapeMarkup' => new \yii\web\JsExpression('function (markup) { return markup; }'),
            'templateResult' => new \yii\web\JsExpression('function(tag) { return tag.text; }'),
            'templateSelection' => new \yii\web\JsExpression('function (tag) { return tag.text; }'),
        ],
    ]) ?>
    <?=$form->field($poster, 'title')->textInput() ?>
    <?=Yii::$app->user->id==\common\config\ConfigData::getSuper()->id?$form->field($poster, 'is_top')->dropDownList($poster::getIsTop()):'' ?>
    <?=Yii::$app->user->id==\common\config\ConfigData::getSuper()->id?$form->field($poster, 'type')->dropDownList($poster::getType()):'' ?>
    <?=$form->field($poster, 'desc')->textarea(['rows'=>5]) ?>
    <?=$form->field($poster, 'floor_head_content')->textarea(['rows'=>5]) ?>
    <div class="">
        <?= \yii\helpers\Html::submitButton($poster->isNewRecord ? '发布' : '保存', ['class' => $poster->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= \yii\helpers\Html::resetButton('重置', ['class' => 'btn']) ?>
    </div>
    <?php \kartik\widgets\ActiveForm::end(); ?>
</div>
