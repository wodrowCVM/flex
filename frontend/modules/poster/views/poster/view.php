<?php
/**
 * @var \common\models\Poster $poster
 * @var \common\models\PosterFloor[] $floors
 * @var \yii\data\Pagination $pages
 * @var \common\models\PosterFloor $poster_floor
 */

$this->title = "帖子信息";
$this->params['breadcrumbs'][] = \kartik\helpers\Html::a('所有主题', '/poster/default/index');
$this->params['breadcrumbs'][] = \kartik\helpers\Html::a('帖子列表', ['/poster/subject/view', 'id' => $poster->posterSubject->id]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-9 topic">
        <div class="panel panel-default" style="margin-bottom: 0px;">
            <div class="panel-body">
                <div>
                    <?php if(count($floors)==0): ?>
                        还没有任何内容
                    <?php endif; ?>
                    <?php foreach ($floors as $k => $v): ?>
                        <div data-key="<?=$v->id ?>" style="border-bottom: 1px solid #ccc;min-height: 200px;margin-bottom: 10px;">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div>
                                        <?= \yii\helpers\Html::a(\yii\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(), ['style' => ['width' => "100px", 'height' => "100px"], 'class' => "media-object"]), $v->createdBy->getMemberUrlArr(), []) ?>
                                    </div>
                                    <br>
                                    <div>
                                        <div class="btn-group btn-group-xs">
                                            <?php if($v->created_by==$poster->created_by): ?>
                                                <button type="button" class="btn btn-primary">楼主</button>
                                            <?php endif; ?>
                                            <button type="button" class="btn btn-default"><?=$v->createdBy->username ?></button>
                                            <?php if($v->floor_sequence==0): ?>
                                                <button type="button" class="btn btn-danger">顶楼</button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-default"><?=$v->floor_sequence ?></button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <button class="btn btn-default btn-xs"><?=date("Y-m-d H:i:s", $v->created_at) ?></button>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <?=$v->content ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="margin-top: 20px;"></div>
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
                <?php $form = \kartik\widgets\ActiveForm::begin(['id' => "floor-form", 'options' => ['data-pjax' => false]]); ?>
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?= $form->field($poster_floor, 'content', ['options' => [],])->textarea(['rows' => 5])->label(false) ?>
                            </div>
                            <div class="notice">最多500个字符</div>
                        </div>
                        <div class="col-md-12">
                            <?= \dmstr\helpers\Html::submitButton('发表', ['class' => "btn btn-default", 'data-loading-text' => "提交中..."]) ?>
                            <?= \dmstr\helpers\Html::resetButton('重置', ['class' => "btn btn-default",]) ?>
                        </div>
                    </div>
                </div>
                <?php \kartik\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 side-bar p0">

        <div class="">

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