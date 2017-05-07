<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午8:31
 */

$level_rule = Yii::$app->user->identity->userInfo->levelRule;
?>

<p>
    <span style="color: #D8582B; font-weight: bold;"><?=$level_rule->name ?></span>
    <span class="pull-right"><a href="/rule">查看等级规则</a> | <a href="/top">排行榜</a></span>
</p>
<div id="w2" class="progress">
    <div class="progress-bar-success progress-bar" role="progressbar" aria-valuenow="<?=Yii::$app->user->identity->userInfo->level ?>" aria-valuemin="<?=$level_rule->begin; ?>" aria-valuemax="<?=$level_rule->end; ?>" style="width:<?=$level_rule->percent1*100 ?>%">
        <?=Yii::$app->user->identity->userInfo->level ?>/<?=$level_rule->end; ?>
        <span class="sr-only"><?=$level_rule->percent1*100 ?>% Complete</span>
    </div>
</div>

<div id="w3" class="progress">
    <div class="progress-bar-info progress-bar" role="progressbar" aria-valuenow="<?=Yii::$app->user->identity->userInfo->level ?>" aria-valuemin="0" aria-valuemax="<?=$level_rule->end; ?>" style="width:<?=$level_rule->percent2*100 ?>%"><?=Yii::$app->user->identity->userInfo->level ?>/<?=$level_rule->end; ?><span class="sr-only"><?=$level_rule->percent2*100 ?>% Complete</span></div>
</div>

<div id="w4" class="progress">
    <div class="progress-bar-warning progress-bar" role="progressbar" aria-valuenow="<?=Yii::$app->user->identity->userInfo->level ?>" aria-valuemin="0" aria-valuemax="<?=\common\models\UserLevelRule::MAX_LEVEL ?>" style="width: <?=$level_rule->percent3*100 ?>%"><?=Yii::$app->user->identity->userInfo->level ?>/<?=\common\models\UserLevelRule::MAX_LEVEL ?><span class="sr-only"><?=$level_rule->percent2*100 ?>% Complete</span></div>
</div>
