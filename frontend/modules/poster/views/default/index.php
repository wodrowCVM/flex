<?php
/**
 * @var \common\models\PosterSubject[] $subjects
 */

$this->title = "所有主题";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-9 topic">
        <div class="panel panel-default" style="margin-bottom: 0px;">
            <div class="panel-heading clearfix children">
                <?= $this->title ?>
            </div>
            <div>
                <?php foreach ($subjects as $k => $v): ?>
                    <div class="list-group" style="margin-bottom: 0px;">
                        <div class="list-group-item" data-key="44">
                            <div class="media">
                                <a class="pull-right" href="/topic/44#comment6">
                                      <span class="badge badge-reply-count">置顶集</span>
                                </a>
                                <div class="media-left">
                                    <?= \yii\helpers\Html::a(\yii\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(), ['style' => ['width' => "50px", 'height' => "50px"], 'class' => "media-object"]), $v->createdBy->getMemberUrlArr(), []) ?>
                                </div>
                                <div class="media-body">

                                    <div class="media-heading title">
                                        <?= \yii\helpers\Html::a($v->title . "集", $v->getUrlArr(), ['title' => $v->title]) ?>
                                        <i class="fa fa-trophy excellent"></i>
                                    </div>

                                    <div class="title-info">
                                        <span>
                                            创建时间 <small><?=date("Y-m-d H:i:s", $v->created_at) ?></small>
                                        </span>
                                        <?php if ($v->posterCount == 0): ?>
                                            <span>暂无帖子</span>
                                        <?php else: ?>
                                            <span>
                                            最后由
                                            <a href="<?= $v->createdBy->getMemberUrl() ?>"><strong> <?= $v->createdBy->username ?> </strong></a>
                                            于 <small><?= date("Y-m-d H:m:s", $v->lastPoster->created_at) ?></small> 发帖
                                        </span>
                                            •
                                            <code><?= $v->posterCount ?></code>个帖子
                                            •
                                            <code><?= $v->posterUserCount ?></code>个发帖人
                                        <?php endif; ?>

                                    </div>
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
                        <?= \dmstr\helpers\Html::a('创建新主题', ['/user/poster/create-subject'], ['class' => "btn btn-primary"]) ?>
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
                        <li><a href="http://www.digpage.com/">深入理解Yii2.0</a></li>
                        <li><a href="http://www.phpcomposer.com/">Composer 中文文档</a></li>
                        <li><a href="https://github.com/PizzaLiu/PHP-FIG">PHP-FIG 编程规范中文</a></li>
                        <li><a href="http://laravel-china.github.io/php-the-right-way/">PHP The Right Way 中文版</a></li>
                        <li><a href="https://github.com/forecho/awesome-yii2">awesome-yii2（Yii2 干货）</a></li>
                        <li><a href="http://phptrends.com/">上升最快的 PHP 类库</a></li>
                        <li><a href="http://www.book.php.code.kekou.de/">Hacking with PHP</a></li>
                        <li><a href="http://pkg.phpcomposer.com/">Packagist / Composer 中国全量镜像</a></li>
                        <li><a href="http://cookbook.getyii.com/"> Yii 2.0 Cookbook 中国翻译版</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>

</div>