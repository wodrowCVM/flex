<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午6:47
 */

$this->title = $story->isNewRecord ? "发表文章" : "修改文章";
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'story' => $story,
]) ?>

