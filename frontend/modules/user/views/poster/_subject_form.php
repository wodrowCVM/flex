<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 上午10:45
 */
/**
 * @var \frontend\modules\user\models\PosterSubject $poster_subject
 */
?>

<div class="user-poster-subject-form">
    <?php $form = \kartik\widgets\ActiveForm::begin(); ?>
    <?=$form->field($poster_subject, 'title')->textInput() ?>
    <?=Yii::$app->user->id==\common\config\ConfigData::getSuper()->id?$form->field($poster_subject, 'is_top')->dropDownList($poster_subject::getIsTop()):'' ?>
    <?=Yii::$app->user->id==\common\config\ConfigData::getSuper()->id?$form->field($poster_subject, 'type')->dropDownList($poster_subject::getType()):'' ?>
    <?=$form->field($poster_subject, 'desc')->textarea(['rows'=>5]) ?>
    <?php
    echo $form->field($poster_subject, 'tagArr')->widget(\kartik\select2\Select2::className(), [
//        'data' => ['adsf'],
        'language' => Yii::$app->language,
        'options' => ['placeholder' => '请选择或输入', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10,
            'allowClear' => true,
            'language' => [
                'errorLoading' => new \yii\web\JsExpression("function () { return '等待结果'; }"),
            ],
            'ajax' => [
                'url' => \yii\helpers\Url::to(['/site/tag-search']),
                'dataType' => 'json',
                'data' => new \yii\web\JsExpression('function(params) { return {name:params.term}; }')
            ],
            'escapeMarkup' => new \yii\web\JsExpression('function (markup) { return markup; }'),
            'templateResult' => new \yii\web\JsExpression('function(tag) { return tag.text; }'),
            'templateSelection' => new \yii\web\JsExpression('function (tag) { return tag.text; }'),
        ],
    ]);
    ?>
    <div class="">
        <?= \yii\helpers\Html::submitButton($poster_subject->isNewRecord ? '发布' : '保存', ['class' => $poster_subject->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= \yii\helpers\Html::resetButton('重置', ['class' => 'btn']) ?>
    </div>
    <?php \kartik\widgets\ActiveForm::end(); ?>
</div>
