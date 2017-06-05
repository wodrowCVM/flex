<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-7
 * Time: 上午11:55
 */
$this->title = "等级规则";
$this->params['breadcrumbs'][] = $this->title;
$level_rule = \common\models\UserLevelRule::find()->limit(20)->all();
?>

<?php foreach(\common\models\UserLevelRule::$update_rules as $k => $v): ?>
    <h2><?=$v['title'] ?></h2>
    等级加<?=$v['level'] ?>,积分加<?=$v['integral'] ?>,金钱加<?=$v['treasure'] ?>.
<?php endforeach; ?>
<h2>连续签到</h2>
等级加5+连续签到天数*5(最大100),积分加5+连续签到天数*5(最大100),金钱加1+连续签到天数*1(最大20).

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
