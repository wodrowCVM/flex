<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午5:43
 * @var \yii\web\View $this
 */
$this->beginContent('@frontend/views/layouts/base.php');
$this->registerCssFile('@web/css/user/user.less');
?>

<div class="wrap">
    <?= $this->render('//public/_navbar') ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <?= $this->render('/public/avatar') ?>
                <div class="clear" style="clear: both"></div>
            </div>
            <div class="col-sm-9">
                <?= \yii\widgets\Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= \common\widgets\Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

    </div>
</div>
<?= $this->render('//public/footer') ?>
<?php // $this->render('//public/online') ?>
<?= $this->render('//public/float_button') ?>


<?php $this->endContent() ?>