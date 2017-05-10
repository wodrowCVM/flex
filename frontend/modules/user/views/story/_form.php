<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $story \common\models\Story */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-level-rule-form">

    <?php $form = ActiveForm::begin([
        'type' => \kartik\form\ActiveForm::TYPE_HORIZONTAL
    ]); ?>

    <?= $form->field($story, 'title', [
        'template' => '{label}<div class="col-md-6">{input}<div class="help-block"></div></div>    ',
    ])->textInput() ?>

    <?= $form->field($story, 'desc', [
        'template' => '{label}<div class="col-md-6">{input}<div class="help-block"></div></div>    ',
    ])->textarea() ?>

    <?= $form->field($story, 'content', [
//        'template' => '{label}<div class="col-md-6">{input}<div class="help-block"></div></div>    ',
    ])->widget(\yii\redactor\widgets\Redactor::className(), [
        'clientOptions' => [
            'imageManagerJson' => ['/redactor/upload/image-json'],
            'imageUpload' => ['/redactor/upload/image'],
            'fileUpload' => ['/redactor/upload/file'],
            'lang' => 'zh_cn',
            'buttons'=>['html', 'bold', 'italic', 'deleted', 'link', 'horizontalrule'],
            'plugins' => ['fontcolor','imagemanager'],
            'minHeight'=>400,
        ],
    ]) ?>

    <?php
    echo $form->field($story, 'tagArr')->widget(\kartik\select2\Select2::className(), [
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

    <div class="col-md-offset-2">
        <?= Html::submitButton($story->isNewRecord ? '发布' : '保存', ['class' => $story->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= \yii\helpers\Html::resetButton('重置', ['class' => 'btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
