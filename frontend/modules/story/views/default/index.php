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
                    <li class="list-group-item article-item" style="margin-bottom: 20px;">
                        <div class="home-list-title">
                            <?= \dmstr\helpers\Html::a($v->title, ['view', 'id'=>$v->id], []) ?>
                        </div>
                        <div class="hide-overflow home-list-content">
                            <?= $v->desc ?>
                        </div>
                        <div class="home-list-bottom">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;
                            发布人：<?=\yii\helpers\Html::a($v->createdBy->username, $v->createdBy->getMemberUrlArr()) ?>
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
                            <?php if($v->created_by == Yii::$app->user->id || Yii::$app->user->id == \common\config\ConfigData::getSuper()->id): ?>
                                <?=\yii\helpers\Html::a('修改', ['/user/story/update', 'id'=>$v->id], ['class'=>'btn btn-default btn-xs pull-right']) ?>
                            <?php endif; ?>
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
            <div class="panel panel-default corner-radius">
                <div class="panel-body text-center">
                    <div class="btn-group">
                        <?= \dmstr\helpers\Html::a('发布新文章', ['/user/story/publish'], ['class' => "btn btn-primary"]) ?>
                    </div>
                </div>
            </div>
            <?=$this->render('/public/hot_story') ?>
        </div>
    </div>
</div>
