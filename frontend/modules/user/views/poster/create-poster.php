<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午6:47
 */
/**
 * @var \common\models\Poster $poster
 */

$this->title = "创建帖子";
$this->params['breadcrumbs'][] = $this->title;

$subject_id = Yii::$app->request->get('id');
?>

<div class="user-poster-create-poster">
    <?php $form = \kartik\widgets\ActiveForm::begin(); ?>
        <div class="form-group field-poster-subject-title required">
            <label class="control-label" for="poster-sugject-title">所属主题</label>

            <input type="text" class="form-control" readonly value="<?=$poster->posterSubject->title ?>">

            <div class="help-block"></div>

        </div>
        <?=$form->field($poster, 'title')->textInput() ?>
        <?=$form->field($poster, 'desc')->textarea(['rows'=>5]) ?>
        <?=\dmstr\helpers\Html::submitButton('保存', ['class'=>'btn btn-primary']) ?>
        <?=\dmstr\helpers\Html::resetButton('重置', ['class'=>'btn btn-danger']) ?>
    <?php \kartik\widgets\ActiveForm::end(); ?>
</div>
