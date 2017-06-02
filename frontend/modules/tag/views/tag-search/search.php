<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 下午5:35
 */
/**
 * @var $tag \frontend\modules\tag\models\Tag
 * @var $items \common\models\ItemTag[]
 * @var $pages \yii\data\Pagination
 */
$this->title = "标签搜索";
$this->params['breadcrumbs'][] = $this->title.":<code>".$tag->name."</code>";
?>

<div class="tag-tag-search-search">
    <div class="row">
        <div class="col-md-9 topic">
            <div class="panel panel-default" style="margin-bottom: 0px;">
                <div class="panel-heading clearfix children">
                    <?= $this->title.":<code>".$tag->name."</code>" ?>
                </div>
                <div class="panel-body">
                    <?php foreach ($items as $k => $v): ?>
                        <div class="list-group" style="margin-bottom: 0px;">
                            <div class="list-group-item" data-key="">
                                <div class="media">
                                    <div class="pull-right">
                                        <?php if($v->created_by == Yii::$app->user->id || Yii::$app->user->id == \common\config\ConfigData::getSuper()->id): ?>
                                            <?=\yii\helpers\Html::a('修改', $v->item->getUpdateUrlArr()) ?>
                                        <?php endif; ?>
                                        <span class="label label-info"><?=\common\models\Item::getType()[$v->item_type] ?></span>
                                    </div>
                                    <div class="media-left">
                                        <?= \yii\helpers\Html::a(\yii\helpers\Html::img($v->createdBy->userInfo->getTextAvatarUrl(), ['style' => ['width' => "50px", 'height' => "50px"], 'class' => "media-object"]), $v->createdBy->getMemberUrlArr(), []) ?>
                                    </div>
                                    <div class="media-body">

                                        <div class="media-heading title">
                                            <?= \yii\helpers\Html::a($v->item_title, $v->item->getUrlArr()) ?>
                                            <i class="fa fa-trophy excellent"></i>
                                        </div>

                                        <div class="title-info">
                                        <span>
                                            创建时间 <small><?=date("Y-m-d H:i:s", $v->created_at) ?></small>
                                        </span>
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
        <div class="col-sm-3">
            <?=$this->render('//public/_tags') ?>
        </div>
    </div>
</div>
