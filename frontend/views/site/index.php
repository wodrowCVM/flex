<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-3
 * Time: 下午4:41
 */

\frontend\assets\site\IndexAsset::register($this);
$this->title = '首页';
?>

<div class="row">
    <div class="col-lg-12">
        <?=$this->render('_sign_in') ?>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <?php  echo $this->render('public/poster') ?>
            </div>
            <div class="col-md-6">
                <?php  echo $this->render('public/story') ?>
            </div>
            <div class="col-md-6">
                <?php  echo $this->render('public/ask') ?>
            </div>
            <div class="col-md-6">
                <?php  echo $this->render('public/bt') ?>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <?=$this->render('/public/_tags') ?>
    </div>
</div>