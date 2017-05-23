<?php
$this->title = "所有主题";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-9 topic">
        <div class="panel panel-default node-panel">
            <div class="panel-heading">
                <h3 class="panel-title text-center">节点导航</h3>
            </div>

            <div class="panel-body p0">
                <dl class="dl-horizontal node-box mb0">
                    <dt>Yii</dt>
                    <dd>
                        <ul class="list-inline">
                            <li><a href="/?node=tricks">技巧库</a></li>
                            <li><a href="/?node=muggle">新手提问</a></li>
                            <li><a href="/?node=module">模块</a></li>
                            <li><a href="/?node=widgets">小部件</a></li>
                            <li><a href="/?node=extension">扩展</a></li>
                            <li><a href="/?node=behaviors">行为</a></li>
                            <li><a href="/?node=helpers">助手</a></li>
                            <li><a href="/?node=video">视频教程</a></li>
                        </ul>
                    </dd>
                    <div class="divider"></div>
                    <dt>Web 开发</dt>
                    <dd>
                        <ul class="list-inline">
                            <li><a href="/?node=php">PHP</a></li>
                            <li><a href="/?node=mongodb">MongoDB</a></li>
                            <li><a href="/?node=redis">Redis</a></li>
                            <li><a href="/?node=mysql">MySQL</a></li>
                            <li><a href="/?node=git">Git</a></li>
                            <li><a href="/?node=linux">Linux</a></li>
                            <li><a href="/?node=nginx">Nginx</a></li>
                            <li><a href="/?node=safety">安全</a></li>
                            <li><a href="/?node=architecture">架构</a></li>
                            <li><a href="/?node=discuss">讨论</a></li>
                            <li><a href="/?node=JavaScript">JavaScript</a></li>
                        </ul>
                    </dd>
                    <div class="divider"></div>
                    <dt>其他</dt>
                    <dd>
                        <ul class="list-inline">
                            <li><a href="/?node=booshit">瞎扯淡</a></li>
                            <li><a href="/?node=tool">工具控</a></li>
                            <li><a href="/?node=share">分享</a></li>
                            <li><a href="/?node=pm-dog">产品控</a></li>
                            <li><a href="/?node=startup">创业</a></li>
                            <li><a href="/?node=jobs">求职招聘</a></li>
                            <li><a href="/?node=translate">翻译</a></li>
                        </ul>
                    </dd>
                    <div class="divider"></div>
                    <dt>社区</dt>
                    <dd>
                        <ul class="list-inline">
                            <li><a href="/?node=notice">公告</a></li>
                            <li><a href="/?node=feedback">反馈</a></li>
                            <li><a href="/?node=community-coding">社区开发</a></li>
                            <li><a href="/?node=no-man-land">无人区</a></li>
                        </ul>
                    </dd>
                    <div class="divider"></div>
                </dl>
            </div>
        </div>
        <div class="panel panel-default" style="margin-bottom: 0px;">
            <div class="panel-heading clearfix children">
                <?=$this->title ?>
            </div>
            <div>
                <?php foreach($subjects as $k => $v): ?>
                    <div class="list-group" style="margin-bottom: 0px;">
                        <div class="list-group-item" data-key="44"><div class="media">
                                <a class="pull-right" href="/topic/44#comment6">
                                    <span class="badge badge-reply-count">6</span>
                                </a>
                                <div class="media-left">
                                    <?=\yii\helpers\Html::a(\yii\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(),['style'=>['width'=>"50px", 'height'=>"50px"], 'class'=>"media-object"]), $v->createdBy->getMemberUrlArr(), []) ?>
                                </div>
                                <div class="media-body">

                                    <div class="media-heading title">
                                        <a href="/topic/44" title="【置顶】关于发帖">【置顶】关于发帖</a>            <i class="fa fa-trophy excellent"></i>        </div>

                                    <div class="title-info">
                                        <a class="remove-padding-left" href="/topic/44"><span class="fa fa-thumbs-o-up"> 9 </span></a> • <a class="node" href="/?node=notice">公告</a> • <span>最后由<a href="/member/zhi8023nan"><strong> zhi8023nan </strong></a>于 1个月前 回复</span> • 3938 次阅读        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
                'firstPageLabel' => '首页',
                'lastPageLabel' => '尾页',
                'prevPageLabel' => '上一页',
                'nextPageLabel' => '下一页',
                'maxButtonCount' => 10, //控制每页显示的页数
            ]);
            ?>
        </div>

    </div>
    <div class="col-md-3 side-bar p0">

        <div class="">

            <div class="panel panel-default corner-radius">


                <div class="panel-body text-center">
                    <div class="btn-group">
                        <?=\dmstr\helpers\Html::a('创建新主题', ['/user/poster/create-subject'], ['class'=>"btn btn-primary"]) ?>
                    </div>
                </div>
            </div>

            <div class="panel panel-default corner-radius">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">小贴士</h3>
                </div>
                <div class="panel-body">
                    <p>在使用 composer 的时候 后面加上 <code>-vvv</code> 就可以看到详情了</p>
                </div>
            </div>

            <div class="panel panel-default corner-radius">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">推荐资源</h3>
                </div>
                <div class="panel-body side-bar">
                    <ul class="list">
                        <li><a href="http://www.digpage.com/">深入理解Yii2.0</a></li><li><a href="http://www.phpcomposer.com/">Composer 中文文档</a></li><li><a href="https://github.com/PizzaLiu/PHP-FIG">PHP-FIG 编程规范中文</a></li><li><a href="http://laravel-china.github.io/php-the-right-way/">PHP The Right Way 中文版</a></li><li><a href="https://github.com/forecho/awesome-yii2">awesome-yii2（Yii2 干货）</a></li><li><a href="http://phptrends.com/">上升最快的 PHP 类库</a></li><li><a href="http://www.book.php.code.kekou.de/">Hacking with PHP</a></li><li><a href="http://pkg.phpcomposer.com/">Packagist / Composer 中国全量镜像</a></li><li><a href="http://cookbook.getyii.com/"> Yii 2.0 Cookbook 中国翻译版</a></li>            </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>

</div>