<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午8:31
 */
?>

<p>
    <span style="color: #D8582B; font-weight: bold;">圣贤</span>
    <span class="pull-right"><a href="/rule">查看等级规则</a> | <a href="/top">排行榜</a></span>
</p>
<div id="w2" class="progress">
    <div class="progress-bar-success progress-bar" role="progressbar" aria-valuenow="52.925" aria-valuemin="0" aria-valuemax="100" style="width:52.925%"><?=Yii::$app->user->identity->userInfo->level ?>/20000<span class="sr-only">52.925% Complete</span></div>
</div>

<div id="w3" class="progress">
    <div class="progress-bar-info progress-bar" role="progressbar" aria-valuenow="52.925" aria-valuemin="0" aria-valuemax="100" style="width:52.925%"><?=Yii::$app->user->identity->userInfo->level ?>/20000<span class="sr-only">52.925% Complete</span></div>
</div>

<div id="w4" class="progress">
    <div class="progress-bar-warning progress-bar" role="progressbar" aria-valuenow="52.925" aria-valuemin="0" aria-valuemax="100" style="width:52.925%"><?=Yii::$app->user->identity->userInfo->level ?>/20000<span class="sr-only">52.925% Complete</span></div>
</div>
