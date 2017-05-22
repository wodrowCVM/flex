<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-22
 * Time: 下午2:32
 */
/**
 * @var \common\models\Talk $talk
 */
?>

<?php
$has_praise = \common\models\TalkPraise::findOne(['talk_id' => $talk->id, 'created_by' => Yii::$app->user->id]) ? true : false;
$praise_count = \common\models\TalkPraise::find()->where(['talk_id' => $talk->id])->count();
?>
<?php if ($has_praise): ?>
    <?= \kartik\icons\Icon::show('thumbs-o-up') . $praise_count ?>
<?php else: ?>
    <?php if(Yii::$app->user->isGuest): ?>
        <?= \dmstr\helpers\Html::a(\kartik\icons\Icon::show('thumbs-o-up') . $praise_count, ['/site/login'], ['class' => "vote up praise_talk_icon", 'data-type' => "feed", 'data-id' => $talk->id]) ?>
    <?php else: ?>
        <?= \dmstr\helpers\Html::a(\kartik\icons\Icon::show('thumbs-o-up') . $praise_count, ['', '_pjax'=>'#talk_default_index', 'praise_talk_id' => $talk->id, 'page'=>Yii::$app->request->get('page'), 'per-page'=>Yii::$app->request->get('per-page')], ['class' => "vote up praise_talk_icon", 'data-type' => "feed", 'data-id' => $talk->id]) ?>
    <?php endif; ?>
<?php endif; ?>
