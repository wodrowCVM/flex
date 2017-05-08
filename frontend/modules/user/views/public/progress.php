<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午8:31
 */

$user_info = Yii::$app->user->identity->userInfo;
$level_rule = Yii::$app->user->identity->userInfo->levelRule;
$x = new \stdClass();
$max_level = \backend\modules\users\models\UserLevelRule::MAX_LEVEL;
$_l_bigin = $level_rule->begin;
$_l_end= $level_rule->end;
$x->percent1 = ($user_info->level-$_l_bigin)/($_l_end-$_l_bigin);
$x->percent2 = ($user_info->level)/($_l_end);
$x->percent3 = ($user_info->level)/($max_level);
?>

<p>
    <span style="color: #D8582B; font-weight: bold;"><?=$level_rule->name ?></span>
    <span class="pull-right"><a href="/jour/default/level-rule" target="_blank">查看等级规则</a> | <a href="/jour/default/top" target="_blank">排行榜</a></span>
</p>
<div id="w2" class="progress">
    <div class="progress-bar-success progress-bar" role="progressbar" aria-valuenow="<?=Yii::$app->user->identity->userInfo->level ?>" aria-valuemin="<?=$level_rule->begin; ?>" aria-valuemax="<?=$level_rule->end; ?>" style="width:<?=$x->percent1*100 ?>%">
        <?=Yii::$app->user->identity->userInfo->level ?>/<?=$level_rule->end; ?>
        <span class="sr-only"><?=$x->percent1*100 ?>% Complete</span>
    </div>
</div>

<div id="w3" class="progress">
    <div class="progress-bar-info progress-bar" role="progressbar" aria-valuenow="<?=Yii::$app->user->identity->userInfo->level ?>" aria-valuemin="0" aria-valuemax="<?=$level_rule->end; ?>" style="width:<?=$x->percent2*100 ?>%"><?=Yii::$app->user->identity->userInfo->level ?>/<?=$level_rule->end; ?><span class="sr-only"><?=$x->percent2*100 ?>% Complete</span></div>
</div>

<!--<div id="w4" class="progress">
    <div class="progress-bar-warning progress-bar" role="progressbar" aria-valuenow="<?/*=Yii::$app->user->identity->userInfo->level */?>" aria-valuemin="0" aria-valuemax="<?/*=\common\models\UserLevelRule::MAX_LEVEL */?>" style="width: <?/*=$x->percent3*100 */?>%"><?/*=Yii::$app->user->identity->userInfo->level */?>/<?/*=\common\models\UserLevelRule::MAX_LEVEL */?><span class="sr-only"><?/*=$x->percent3*100 */?>% Complete</span></div>
</div>-->
