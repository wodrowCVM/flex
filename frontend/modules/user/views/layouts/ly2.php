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
        <div class="user-default-index">
            <div class="row">
                <div class="col-sm-3">
                    <!--left col-->
                    <?= $this->render('/public/avatar') ?>
                    <?= $this->render('/public/progress') ?>
                    <?= $this->render('/public/persion_info') ?>
                    <?= $this->render('/public/achievement') ?>
                </div>
                <div class="col-lg-6">
                    <?=$content ?>
                </div>
                <div class="col-lg-3">

                    <?= $this->render('/public/attention') ?>
                    <?= $this->render('/public/fans') ?>
                    <?php // echo $this->render('/public/visitors') ?>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->render('//public/footer') ?>
<?php // $this->render('//public/online') ?>
<?= $this->render('//public/float_button') ?>


<?php $this->endContent() ?>