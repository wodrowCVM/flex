
<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午4:11
 *
 * @var boolean $is_sign_in
 */
$_date = date("Ymd", time());
$sign_in = \common\models\UserSignIn::findOne(['user_id'=>Yii::$app->user->id, 'date'=>$_date]);
$has_sign_in_c = \common\models\UserSignIn::find()->where(['date'=>$_date])->count();
if (Yii::$app->request->isPjax){
    if ($_REQUEST['_pjax']=='#sign_in'){
        $trans = Yii::$app->db->beginTransaction();
        try{
            $sign_in = new \common\models\UserSignIn();
            $sign_in->user_id = Yii::$app->user->id;
            $sign_in->date = $_date;
            $sign_in->time = time();
            $yesterday_sign_in = \common\models\UserSignIn::findOne(['user_id'=>Yii::$app->user->id, 'date'=>$_date-1]);
            $c = $yesterday_sign_in?$yesterday_sign_in->countinously_days+1:1;
            $sign_in->countinously_days = $c;
            if ($sign_in->save()){}else{
                $sign_in = false;
            }
            $has_sign_in_c = \common\models\UserSignIn::find()->where(['date'=>$_date])->count();
            $trans->commit();
        }catch (\yii\db\Exception $e){
            $trans->rollBack();
            throw $e;
        }
    }
}
?>

<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body text-center mp0">
                <p>
                    Get Flexiable，对！没错！这里就是 Flexiable 社区，我们想做国内最好的 Flexiable 社区。
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <?php \yii\widgets\Pjax::begin(['id'=>'sign_in'])?>
        <div class="btn-group" id="sign_in_btn_group" style="width: 100%;height: 40px;margin-bottom: 20px;">
            <?php if($sign_in): ?>
                <?=\yii\helpers\Html::button(\kartik\icons\Icon::show('calendar-check-o').'已连续签到'.$sign_in->countinously_days.'天', [
                    'class' => "btn",
                    'style' => [
                        'width'=>'50%',
                        'height'=>'100%',
                    ],
                    'disabled'=>true,
                ]) ?>
            <?php else: ?>
                <?=\yii\helpers\Html::a('签到', ['index'], [
                    'id'=>'sign_in_btn',
                    'class' => "btn btn-warning",
                    'style' => [
                        'width'=>'50%',
                        'height'=>'100%',
                        'line-height'=>"26px",
                    ],
                ]) ?>
            <?php endif; ?>
            <button  class="btn btn-primary" style="width: 50%;height: 100%;">今日已签到<?=$has_sign_in_c ?>人</button>
        </div>
        <?php \yii\widgets\Pjax::end()?>
    </div>
</div>

