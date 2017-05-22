<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-22
 * Time: 下午4:29
 */
/**
 * @var \common\models\Talk $talk
 */
?>

<div class="ups">
    <?php $praises = \common\models\TalkPraise::find()->where(['talk_id' => $talk->id])->limit(10)->all(); ?>
    <?php foreach ($praises as $k2 => $v2): ?>
        <a href="<?= $v2->createdBy->getMemberUrl() ?>" rel="author"><?= $v2->createdBy->username ?></a> ,
    <?php endforeach; ?>
    <?php if ($praises): ?>
        觉得很赞
    <?php endif; ?>
</div>