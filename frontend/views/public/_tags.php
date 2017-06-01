<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-10
 * Time: 下午4:32
 */
/**
 * @var \common\models\Tag[] $tags
 */
$tags = \common\models\Tag::find()->all();
?>
<div class="panel panel-default">
    <div class="panel-heading"><?=\kartik\icons\Icon::show('cloud') ?> 标签云</div>
    <div class="panel-body">
        <?php foreach($tags as $k => $v): ?>
            <?=\dmstr\helpers\Html::a('<span class="label label-default label-fix">'.$v->name.'</span>', $v->getSearchUrlArr(), []) ?>
        <?php endforeach; ?>
    </div>
</div>
