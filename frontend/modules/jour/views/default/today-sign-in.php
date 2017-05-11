<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-11
 * Time: 上午9:41
 */
$this->title = "今日签到";
$this->params['breadcrumbs'][] = $this->title;

$users = \common\models\User::find()->joinWith('userInfo as ui')->orderBy(['ui.level'=>SORT_DESC])->limit(42)->all();
$users = \common\components\tools\Tools::arrayCopy($users, 10);
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default list-panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?=\kartik\icons\Icon::show('users') ?> 签到会员榜</h3>
            </div>

            <div class="panel-body row hidden-xs" style="height: 420px;">
                <?php foreach ($users as $k => $v): ?>
                    <div class="col-xs-2" style="min-width: 80px;">
                        <div class="media user-card">
                            <div class="media-left" style="padding-right: 5px;">
                                <?=\dmstr\helpers\Html::a(\yii\helpers\Html::img($v->userInfo->textAvatarUrl, [
                                    'width' => 40,
                                    'height' => 40,
                                ]), ["#"], ['title'=>$v->username]) ?>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <?=\dmstr\helpers\Html::a($v->username, ['#'], ['title'=>$v->username]) ?>
                                </div>
                                <div class="" style="height: 15px;font-size: 12px;line-height: 15px;">
                                    <?=$v->userInfo->levelRule->name ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
