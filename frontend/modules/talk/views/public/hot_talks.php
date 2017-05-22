<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-19
 * Time: 下午3:03
 */
/**
 * @var \common\models\Talk[] $hot_talks
 */

$hot_talks = \common\models\Talk::find()->orderBy(['created_at' => SORT_DESC])->limit(5)->all();
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">热门说说</h2>
    </div>
    <div class="panel-body">
        <?=$this->render('show_talks', ['talks'=>$hot_talks]) ?>
    </div>
</div>
