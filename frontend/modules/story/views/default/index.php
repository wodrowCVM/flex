<?php
/**
 * @var \yii\web\View $this
 * @var \frontend\modules\story\models\Story $storys
 * @var \yii\data\Pagination $pages
 */

$this->title = "文章列表";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="story-default-index">
    <div class="row">
        <div class="col-md-9">
            <ul class="list-group">
                <?php foreach ($storys as $k => $v): ?>
                    <li class="list-group-item article-item">
                        <div class="home-list-title">
                            <?= \dmstr\helpers\Html::a($v->title, ['view', 'id'=>$v->id], []) ?>
                        </div>
                        <div class="hide-overflow home-list-content">
                            <?= $v->desc ?>
                        </div>
                        <div class="home-list-bottom">
                            <span class="glyphicon glyphicon-calendar"></span>&nbsp;
                            发布日期：
                            <?=date("Y-m-d", $v->created_at) ?>
                            <!--<span class="glyphicon glyphicon-list" style="margin-left:15px;"></span>&nbsp;分类：
                            <a href="/category/other.html">其他</a>-->
                            <span class="glyphicon glyphicon-eye-open" style="margin-left:15px;"></span>&nbsp;热度：
                            <?=$v->view_count ?>°C
                            <span class="glyphicon glyphicon-comment" style="margin-left:15px;"></span>
                            <?=\common\models\StoryReply::find()->where(['story_id'=>$v->id])->count() ?>条评论
                            <?=\dmstr\helpers\Html::a('阅读全文', ['view', 'id'=>$v->id], ['class'=>'btn btn-default btn-xs pull-right']) ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
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
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-star"></span>&nbsp;最新发布
                </div>
                <div class="panel-body">
                    <ul class="sidebar-ul">
                        <li class="sidebar-li"><a href="/article/53.html" title="从理论到实践，全方位认识DNS（实践篇）">从理论到实践，全方位认识DNS（实践篇）</a>
                        </li>
                        <li class="sidebar-li"><a href="/article/52.html" title="从理论到实践，全方位认识DNS（理论篇）">从理论到实践，全方位认识DNS（理论篇）</a>
                        </li>
                        <li class="sidebar-li"><a href="/article/51.html" title="Docker部署笔记">Docker部署笔记</a></li>
                        <li class="sidebar-li"><a href="/article/50.html" title="Yii2自定义JSON格式响应">Yii2自定义JSON格式响应</a>
                        </li>
                        <li class="sidebar-li"><a href="/article/49.html" title="MySQL加锁处理分析">MySQL加锁处理分析</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-fire"></span>&nbsp;热门文章
                </div>
                <div class="panel-body">
                    <ul class="sidebar-ul">
                        <li class="sidebar-li"><a href="/article/9.html"
                                                  title="HTML5触摸事件（多点、单点触控）">HTML5触摸事件（多点、单点触控）</a></li>
                        <li class="sidebar-li"><a href="/article/13.html"
                                                  title="Yii 2.0鉴权之RBAC(Yii2.0 Authorization By RBAC)">Yii
                                2.0鉴权之RBAC(Yii2.0 Authorization By RBAC)</a></li>
                        <li class="sidebar-li"><a href="/article/17.html" title="Yii2.0 验证码的使用">Yii2.0 验证码的使用</a></li>
                        <li class="sidebar-li"><a href="/article/23.html" title="微信支付之APP支付">微信支付之APP支付</a></li>
                        <li class="sidebar-li"><a href="/article/11.html"
                                                  title="Yii 2.0鉴权之访问控制过滤器(Yii2.0 Authorization By ACF)">Yii
                                2.0鉴权之访问控制过滤器(Yii2.0 Authorization By ACF)</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
