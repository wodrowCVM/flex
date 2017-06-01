<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午6:32
 */
$this->title = "我的帖子";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-poster-index">
    <?=\yii\helpers\Html::a('帖子主题列表', '/user/poster/poster-subject-list') ?>
    <?=\yii\helpers\Html::a('帖子列表', '/user/poster/poster-list') ?>
</div>
