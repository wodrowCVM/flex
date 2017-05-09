<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\users\models\UserLevelRule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-level-rule-form">

    <?php $form = ActiveForm::begin([
        'type' => \kartik\form\ActiveForm::TYPE_HORIZONTAL
    ]); ?>

    <?= $form->field($model, 'title', [
        'template' => '{label}<div class="col-md-6">{input}<div class="help-block"></div></div>    ',
    ])->textInput() ?>

    <?= $form->field($model, 'content', [
//        'template' => '{label}<div class="col-md-6">{input}<div class="help-block"></div></div>    ',
    ])->widget(\yii\redactor\widgets\Redactor::className(), [
        'clientOptions' => [
            'imageManagerJson' => ['/redactor/upload/image-json'],
            'imageUpload' => ['/redactor/upload/image'],
            'fileUpload' => ['/redactor/upload/file'],
            'lang' => 'zh_cn',
            'buttons'=>['html', 'bold', 'italic', 'deleted', 'link', 'horizontalrule'],
            'plugins' => ['fontcolor','imagemanager'],
            'minHeight'=>500,
        ],
    ]) ?>

    <?= $form->field($model, 'label', [
        'template' => '{label}<div class="col-md-4">{input}<div class="help-block"></div></div>    ',
    ])->textInput() ?>

    <div class="col-md-offset-2">
        <?= Html::submitButton($model->isNewRecord ? '发布' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= \yii\helpers\Html::resetButton('重置', ['class' => 'btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
