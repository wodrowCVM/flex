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
        <?=$this->render('public/sign_in') ?>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <?=$this->render('public/commenting') ?>
            </div>
            <div class="col-md-6">
                <?=$this->render('public/story') ?>
            </div>
            <div class="col-md-6">
                <?=$this->render('public/ask') ?>
            </div>
            <div class="col-md-6">
                <?=$this->render('public/bt') ?>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <?=$this->render('public/mem_list') ?>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default node-panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">节点导航</h3>
            </div>

            <div class="panel-body p0">
                <dl class="dl-horizontal node-box mb0">
                    <dt>分享</dt>
                    <dd>
                        <ul class="list-inline">
                            <li><a href="/node/jobs">招聘</a></li>
                            <li><a href="/node/booshit">瞎扯淡</a></li>
                            <li><a href="/node/health">健康</a></li>
                            <li><a href="/node/startup">创业</a></li>
                        </ul>
                    </dd>
                    <div class="divider"></div>
                </dl>
            </div>
        </div>
    </div>
</div>