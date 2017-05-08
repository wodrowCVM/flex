<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-7
 * Time: 上午11:55
 */
$level_rule = \common\models\UserLevelRule::find()->limit(20)->all();
?>


<h2>发文章</h2>
金钱加20,等级加5,积分加10.

<h2>发问题</h2>
金钱减悬赏分

<h2>发帖子</h2>
金钱加2

<h2>回复帖子</h2>
金钱加1

<h2>帖子被加精</h2>
金钱加10,积分加20,等级加50.

<h2>回答问题</h2>
金钱加5

<h2>答案被采纳</h2>
金钱加悬赏分，积分加10

<h2>等级名称</h2>
<table class="table table-bordered">
    <tbody>
    <?php foreach($level_rule as $k => $v): ?>
        <tr>
            <td width="200"><?=$v->begin ?> - <?=$v->end ?></td>
            <td width="200"><?=$v->id ?>级</td>
            <td><?=$v->name ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
