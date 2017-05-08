<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午6:47
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午5:14
 */
$this->title = $model->isNewRecord ? "发表文章":"修改文章";
?>

<div class="frontend-user-story-publish">
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <?= $this->render('/public/avatar') ?>
        </div>
        <div class="col-lg-9">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>

