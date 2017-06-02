<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午5:52
 */
$user = Yii::$app->user->identity;
$is_you = !Yii::$app->user->isGuest;
if ($member_id = Yii::$app->request->get('member-id')){
    $user = \common\models\User::findOne(['id'=>$member_id]);
    $is_you = Yii::$app->user->id == $member_id;
}
?>
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-dashboard"></i>个人成就</div>
    <ul class="list-group">
        <li class="list-group-item text-right">
            <span class="pull-left"><strong class="">发表文章</strong></span>
            <?=\common\models\Story::find()->where(['created_by'=>$user->id])->count() ?>                </li>
        <li class="list-group-item text-right">
            <span class="pull-left"><strong class="">发布说说</strong></span>
            <?=\common\models\Talk::find()->where(['created_by'=>$user->id])->count() ?>                </li>
        <li class="list-group-item text-right">
            <span class="pull-left"><strong class="">帖子主题</strong></span>
            <?=\common\models\PosterSubject::find()->where(['created_by'=>$user->id])->count() ?>                </li>
    </ul>
</div>
