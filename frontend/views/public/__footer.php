<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午9:15
 */
?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <dl class="col-sm-2">
                <dt>网站信息</dt>
                <dd><a href="<?= \yii\helpers\Url::to(['/site/about']) ?>">关于我们</a></dd>
                <dd><a href="<?= \yii\helpers\Url::to(['/site/contributors']) ?>">贡献者</a></dd>
            </dl>
            <dl class="col-sm-2">
                <dt>相关合作</dt>
                <dd><a href="<?= \yii\helpers\Url::to(['/site/contact']) ?>">联系我们</a></dd>
            </dl>
            <dl class="col-sm-2">
                <dt>关注我们</dt>
                <dd><a href="<?= \yii\helpers\Url::to(['/site/timeline']) ?>">时间线</a></dd>
            </dl>
            <dl class="col-sm-3">
                <dt> 技术采用</dt>
                <dd class="fs12">
                    由 <a href="https://github.com/wodrow">wodrow</a> 创建 项目地址: <a href="https://github.com/wodrowCVM/flex">flex</a>
                    <br/>
                    <?= Yii::powered() ?> <?= Yii::getVersion() ?>
                    <br/>
                    &copy; <?= \Yii::$app->name ?> <?= date('Y') ?>&nbsp;•&nbsp; <?= floor(Yii::getLogger()->getElapsedTime() * 1000).' ms';?>
                </dd>
            </dl>
            <div class="col-sm-3">
                <a href="http://www.qiniu.com/">
                    <img src="http://assets.qiniu.com/qiniu-transparent.png" alt="qiniu" width="240">
                </a>
                <p>赞助本站，你的LOGO将出现在这里</p>
            </div>
        </div>
    </div>
</footer>
