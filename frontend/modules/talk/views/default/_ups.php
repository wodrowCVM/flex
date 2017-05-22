<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-22
 * Time: 下午4:29
 */
/**
 * @var \common\models\Talk $talk
 */
$x = time();
if (Yii::$app->request->isPjax){
    $x = date("Y-m-d H:i:s");
}
?>

<?php \yii\widgets\Pjax::begin(['id' => '#member_talk_praise_'.$talk->id]); ?>
<div class="ups">
    <?=\dmstr\helpers\Html::a('test', ['', '_pjax'=>'#member_talk_praise_'.$talk->id, 'praise_talk_id'=>$talk->id]) ?>
    <?=$x ?>
    <?php $praises = \common\models\TalkPraise::find()->where(['talk_id' => $talk->id])->limit(10)->all(); ?>
    <?php foreach ($praises as $k2 => $v2): ?>
        <a href="<?= $v2->createdBy->getMemberUrl() ?>" rel="author"><?= $v2->createdBy->username ?></a> ,
    <?php endforeach; ?>
    <?php if ($praises): ?>
        觉得很赞
    <?php endif; ?>
</div>
<?php \yii\widgets\Pjax::end(); ?>