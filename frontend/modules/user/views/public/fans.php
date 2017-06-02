<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午8:33
 */
/**
 * @var $fans \common\models\Fans
 */
$user = Yii::$app->user->identity;
$is_you = !Yii::$app->user->isGuest;
if ($member_id = Yii::$app->request->get('member-id')){
    $user = \common\models\User::findOne(['id'=>$member_id]);
    $is_you = Yii::$app->user->id == $member_id;
}
$fans_query = \common\models\Fans::find()->where(['at_user'=>$user->id]);
$fans = $fans_query->limit(20)->all();
$fans_count = $fans_query->count();
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">粉丝 <span class="badge"><?=$fans_count ?></span></h2>
        <?php if($fans_count>20): ?>
<!--            <span class="pull-right"><a class="btn btn-xs" href="/user/30998/follow">所有粉丝»</a></span>-->
        <?php endif; ?>
    </div>
    <div class="panel-body">
        <ul class="avatar-list">
            <?php foreach($fans as $k => $v): ?>
                <li><a href="<?=$v->follower0->getMemberUrl() ?>" rel="author"><?=\yii\helpers\Html::img($v->follower0->userInfo->getTextAvatarUrl(), ['width'=>50, 'height'=>50]) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
