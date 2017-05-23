<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午4:11
 */


$hot_storys = \common\models\Story::find()->alias('s')->joinWith("storyReplies AS sr")->select([
    's.*',
    'sc'=>'COUNT(sr.id)',
])->groupBy(['s.id'])->orderBy(['sc'=>SORT_DESC, 'created_at'=>SORT_DESC])->limit(5)->all();
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-fire"></span>&nbsp;热门文章
    </div>
    <div class="panel-body">
        <ul class="sidebar-ul">
            <?php foreach($hot_storys as $k => $v): ?>
                <li class="sidebar-li">
                    <?=\dmstr\helpers\Html::a($v->title, $v->getUrlArr(), ['title'=>$v->title]) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

