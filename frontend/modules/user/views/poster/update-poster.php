<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午6:47
 */
/**
 * @var \frontend\modules\user\models\Poster $poster
 */

$this->title = "修改帖子";
$this->params['breadcrumbs'][] = \yii\helpers\Html::a('主题列表', ['poster-subject-list']);
$this->params['breadcrumbs'][] = \yii\helpers\Html::a('帖子列表', ['poster-list']);
$this->params['breadcrumbs'][] = $this->title;

$subject_id = Yii::$app->request->get('id');
?>

<div class="user-poster-update-poster">
    <?=$this->render('_poster_form', ['poster' => $poster]) ?>
</div>
