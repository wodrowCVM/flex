<?php
/**
 * @var \common\models\Talk[] $talks
 * @var \yii\data\Pagination $pages
 */

$this->title = "所有说说";
$this->params['breadcrumbs'][] = $this->title;

$x_talks = \common\models\Talk::find()->orderBy(['created_at' => SORT_DESC])->limit(5)->all();
?>

<div class="talk-default-index">
    <div class="row">
        <div class="col-lg-9">
            <div class="page-header">
                <h1><?= $this->title ?></h1>
            </div>
            <?=$this->render('_index_talks', ['talks'=>$talks]) ?>
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

        <div class="col-lg-3">
            <?=$this->render('/public/top_talks') ?>
            <?=$this->render('/public/hot_talks') ?>
        </div>
    </div>
</div>
