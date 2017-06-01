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

$this->title = "修改主题";
$this->params['breadcrumbs'][] = \yii\helpers\Html::a('主题列表', ['poster-subject-list']);
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-poster-create-subject">
    <?=$this->render('_subject_form', ['poster_subject' => $poster_subject]) ?>
</div>
