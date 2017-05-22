<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-22
 * Time: 下午1:37
 */
/**
 * @var \common\models\Talk[] $talks
 */
?>

<ul class="media-list feed-list">
    <?php foreach ($talks as $k => $v): ?>
        <?=$this->render('_index_one_talk', ['talk'=>$v]) ?>
    <?php endforeach; ?>
</ul>
