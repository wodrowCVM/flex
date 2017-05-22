<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-22
 * Time: 下午1:22
 */
/**
 * @var \common\models\Talk[] $talks
 */

?>

<ul class="media-list media-feed feed-side">
    <?php foreach ($talks as $k => $v): ?>
        <?=$this->render('_talk', ['talk'=>$v]) ?>
    <?php endforeach; ?>
</ul>
