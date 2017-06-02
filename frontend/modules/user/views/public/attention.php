<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午8:33
 */
/**
 * @var $atts \common\models\Fans
 */
$user = Yii::$app->user->identity;
$is_you = !Yii::$app->user->isGuest;
if ($member_id = Yii::$app->request->get('member-id')){
    $user = \common\models\User::findOne(['id'=>$member_id]);
    $is_you = Yii::$app->user->id == $member_id;
}
$atts_query = \common\models\Fans::find()->where(['follower'=>$user->id]);
$atts = $atts_query->limit(20)->all();
$atts_count = $atts_query->count();
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">关注 <span class="badge"><?=$atts_count ?></span></h2>
        <?php if($atts_count>20): ?>
<!--            <span class="pull-right"><a class="btn btn-xs" href="/user/30998/follow">所有关注»</a></span>-->
        <?php endif; ?>
    </div>
    <div class="panel-body">
        <ul class="avatar-list">
            <?php foreach($atts as $k => $v): ?>
                <li><a href="<?=$v->atUser->getMemberUrl() ?>" rel="author"><?=\yii\helpers\Html::img($v->atUser->userInfo->getTextAvatarUrl(), ['width'=>50, 'height'=>50]) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
