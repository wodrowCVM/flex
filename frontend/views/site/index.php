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
                <div class="btn-group" style="width: 100%;height: 40px;margin-bottom: 20px;">
                    <button type="button" class="btn" style="width: 50%;height: 100%;">
                        <?=\kartik\icons\Icon::show('calendar-check-o') ?>
                    </button>
                    <button type="button" class="btn btn-primary" style="width: 50%;height: 100%;">按钮 2</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <?=$this->render('public/commenting') ?>
            </div>
            <div class="col-md-6">
                <?=$this->render('public/article') ?>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default list-panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">会员榜</h3>
            </div>

            <div class="panel-body row">

                <?php foreach ($users as $k => $v): ?>
                    <div class="col-xs-2" style="min-width: 80px;">
                        <div class="media user-card">
                            <div class="media-left">
                                <a href="/member/wodrow"
                                   title="<?= $v->username ?>"><?= \yii\helpers\Html::img($v->userInfo->textAvatarUrl, [
                                        'width' => 50,
                                        'height' => 50,
                                    ]) ?></a></div>
                            <div class="media-body hidden-xs">
                                <div class="media-heading">
                                    <a href="/member/wodrow" title="<?= $v->username ?>"><?= $v->username ?></a></div>
                                <div class="">
                                    积分：0
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
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