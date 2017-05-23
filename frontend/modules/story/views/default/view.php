<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-10
 * Time: 下午5:30
 */

/**
 * @var \frontend\modules\story\models\Story $story
 * @var \common\models\StoryRelpy $story_reply
 */
$this->title = $story->title;
$this->params['breadcrumbs'][] = \dmstr\helpers\Html::a('文章列表',['/story/default/index']);
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-9">
        <div class="article-detail">
            <div class="article-top">
                <div class="article-title"><h3><?= $story->title ?></h3></div>
                <div class="article-tag">
                    <span class="glyphicon glyphicon-calendar"></span>
                    发布日期： <?= date("Y-m-d H:i:s", $story->created_at) ?>
                    <!--<span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>
                    分类：
                    <a href="/category/other.html">其他</a>-->
                    <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>
                    热度：
                    <?=$story->view_count ?>°C
                    <span class="glyphicon glyphicon-tags" style="margin-left:15px;"></span>
                    标签：
                    <a href="/tag/117.html"><span class="label label-default label-fix">dns</span></a>
                </div>
                <div class="article-notice">
                    <p><span class="glyphicon glyphicon-pushpin"></span>&nbsp;提示：转载请注明原文链接</p>
                    <p><span class="glyphicon glyphicon-pushpin"></span>
                        本文永久链接：
                        <?=\yii\helpers\Html::a(Yii::$app->request->absoluteUrl, Yii::$app->request->absoluteUrl) ?>
                    </p>
                </div>
            </div>
            <div class="articlt-boby"><?= $story->content ?></div>
        </div>

        <div class="panel panel-default guestbook">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;评论
            </div>
            <div class="panel-body">
                <div class="comment-list">
                    <div class="comment">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="comment-head"><span class="glyphicon glyphicon-user"></span></div>
                            </div>
                            <div class="col-md-11">
                                <div class="comment-title"><span class="username">prime</span>&nbsp;<small>2016-08-10 14:42:44</small></div>
                                <div class="comment-content">感觉你博客风格挺不错的，Sharks  有开源吗？  ：）</div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="comment-head"><span class="glyphicon glyphicon-user"></span></div>
                            </div>
                            <div class="col-md-11">
                                <div class="comment-title"><span class="username">dyllen</span>&nbsp;<small>2016-08-02 23:30:31</small></div>
                                <div class="comment-content">这本来是一月份写的，后面换了服务器，从四月份的备份里面恢复的发现这篇不见了。</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $form = \kartik\widgets\ActiveForm::begin(['id' => "comment-form", 'options' => []]); ?>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                <?=$form->field($story_reply, 'at_user', [
                                    'template'=>'<div class="input-group form-group"><span class="input-group-addon">@</span>{input}</div>',
                                ])->textInput(['style'=>['background-image' => 'url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/ il8IalkCLBfNVAAAAABJRU5ErkJggg=="); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;'],'readonly'=>'true'])->label(false) ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?=$form->field($story_reply, 'content', ['options' => [],])->textarea(['rows'=>5])->label(false) ?>
                                </div>
                                <div class="notice">最多500个字符</div>
                            </div>
                            <div class="col-md-12">
                                <?=\dmstr\helpers\Html::submitButton('发表',['class'=>"btn btn-default", 'data-loading-text'=>"提交中..."]) ?>
                                <?=\dmstr\helpers\Html::resetButton('重置',['class'=>"btn btn-default",]) ?>
                            </div>
                        </div>
                    </div>
                    <?php \kartik\widgets\ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 visible-lg-block">
        <div id="article-sidebar" class="article-sidebar affix-top">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-fire"></span>&nbsp;同类热门
                </div>
                <div class="panel-body">
                    <ul class="sidebar-ul">
                        <li class="sidebar-li"><a href="/article/31.html" title="跨域请求方案 - CORS">跨域请求方案 - CORS</a></li>
                        <li class="sidebar-li"><a href="/article/41.html" title="防御CSRF攻击的一般方法">防御CSRF攻击的一般方法</a></li>
                        <li class="sidebar-li"><a href="/article/21.html" title="REST和认证 HMAC">REST和认证 HMAC</a></li>
                        <li class="sidebar-li"><a href="/article/40.html" title="防御XSS的一般方法">防御XSS的一般方法</a></li>
                        <li class="sidebar-li"><a href="/article/30.html" title="Apache配置优化">Apache配置优化</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-random"></span>&nbsp;随机推荐
                </div>
                <div class="panel-body">
                    <ul class="sidebar-ul">
                        <li class="sidebar-li"><a href="/article/51.html" title="Docker部署笔记">Docker部署笔记</a></li>
                        <li class="sidebar-li"><a href="/article/52.html" title="从理论到实践，全方位认识DNS（理论篇）">从理论到实践，全方位认识DNS（理论篇）</a>
                        </li>
                        <li class="sidebar-li"><a href="/article/24.html" title="Git的配置">Git的配置</a></li>
                        <li class="sidebar-li"><a href="/article/21.html" title="REST和认证 HMAC">REST和认证 HMAC</a></li>
                        <li class="sidebar-li"><a href="/article/40.html" title="防御XSS的一般方法">防御XSS的一般方法</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
