<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午6:47
 */
/**
 * @var \common\models\PosterSubject $poster_subject
 */

$this->title = "创建主题";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-poster-create-subject">
    <?php $form = \kartik\widgets\ActiveForm::begin(); ?>
        <?=$form->field($poster_subject, 'title')->textInput() ?>
        <?=$form->field($poster_subject, 'desc')->textarea(['rows'=>5]) ?>
        <?=\dmstr\helpers\Html::submitButton('保存', ['class'=>'btn btn-primary']) ?>
        <?=\dmstr\helpers\Html::resetButton('重置', ['class'=>'btn btn-danger']) ?>
    <?php \kartik\widgets\ActiveForm::end(); ?>
</div>
