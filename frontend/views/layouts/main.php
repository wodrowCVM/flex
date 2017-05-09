<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午5:43
 * @var \yii\web\View $this
 */
?>
<?php $this->beginContent('@frontend/views/layouts/base.php'); ?>

<div class="wrap">
    <?= $this->render('//public/_navbar') ?>
    <div class="container">
        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= \common\widgets\Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<?= $this->render('//public/footer') ?>
<?php // $this->render('//public/online') ?>
<?= $this->render('//public/float_button') ?>

<?php $this->endContent(); ?>