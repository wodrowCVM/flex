<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午5:14
 */
$this->title = "设置";
?>

<div class="frontend-user-setting-index">
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <?= $this->render('/public/avatar') ?>
        </div>
        <div class="col-lg-9">
            <?php $form = \kartik\form\ActiveForm::begin([
                'type' => \kartik\form\ActiveForm::TYPE_HORIZONTAL
            ]); ?>
            <?=$form->field($user, 'username', [
                'template' => '{label}<div class="col-md-6">{input}<div class="help-block"></div></div>{error}',
            ])->textInput([ 'readonly' => true]) ?>
            <?=$form->field($user, 'email', [
                'template' => '{label}<div class="col-md-6">{input}<div class="help-block"></div></div>{error}',
            ])->textInput([ 'readonly' => true]) ?>
            <?=$form->field($user, 'status', [
                'template' => '{label}<div class="col-md-2">{input}<div class="help-block"></div></div>{error}',
            ])->textInput([ 'readonly' => true]) ?>
            <?=$form->field($user_info, 'nickname', [
                'template' => '{label}<div class="col-md-4">{input}<div class="help-block"></div></div>{error}',
            ])->textInput() ?>
            <?=$form->field($user_info, 'avatar', [
                'template' => '{label}<div class="col-md-2">{input}<div class="help-block"></div></div><div style="line-height: 34px;color: red;">汉字不多于2个，字符不多于4个，注意美观。</div>{error}  ',
            ])->textInput() ?>
            <?=$form->field($user_info, 'type', [
                'template' => '{label}<div class="col-md-2">{input}<div class="help-block"></div></div>{error}  ',
            ])->textInput() ?>
            <?=$form->field($user_info, 'qq', [
                'template' => '{label}<div class="col-md-4">{input}<div class="help-block"></div></div>{error}  ',
            ])->textInput() ?>
            <?=$form->field($user_info, 'mobile', [
                'template' => '{label}<div class="col-md-4">{input}<div class="help-block"></div></div>{error}  ',
            ])->textInput() ?>
            <div class="col-md-offset-2">
                <?=\yii\helpers\Html::submitButton('提交', ['class'=>'btn btn-primary']) ?>
                <?=\yii\helpers\Html::resetButton('重置', ['class'=>'btn']) ?>
            </div>
            <?php \kartik\form\ActiveForm::end(); ?>
        </div>
    </div>
</div>
