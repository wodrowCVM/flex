<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-10
 * Time: 上午9:44
 */
$this->title = "修改文章-".$story->title;
$this->params['breadcrumbs'][] = \yii\helpers\Html::a('文章列表', ['index']);
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'story' => $story,
]) ?>
