<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-10
 * Time: 下午1:40
 */

$this->title = "我的文章列表";
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$columns = [
    [
        'class' => \kartik\grid\ExpandRowColumn::className(),
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return \kartik\grid\GridView::ROW_COLLAPSED;
        },
        'detail' => function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderPartial('view', ['story'=>$model, 'id'=>$key]);
        },
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true,
        'pageSummary'=>'总计',//可以是字符串，当为true时，自动合计
    ],
    'id',
    'title',
    [
        'attribute' => 'user.username',
        'label' => '创建者',
    ],
    [
        'attribute' => 'updateUser.username',
        'label' => '修改者',
    ],
    'created_at:datetime',
    'updated_at:datetime',
    [
        'class' => \kartik\grid\ActionColumn::className(),
        'header' => '操作',
        'template' => '{view} {update} {delete}',//只需要展示删除和更新
//            'headerOptions' => [],
        'buttons' => [
            'view' => function($url, $model, $key){
                return \yii\helpers\Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['/user/story/view', 'id'=>$key], [
                    'class' => 'data-view',
                    'data-id' => $key,
                ]);
            },
            'update' => function($url, $modal, $key){
                return \yii\helpers\Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/user/story/update', 'id'=>$key], [
                    'class' => 'data-update',
                    'data-id' => $key,
                ]);
            },
            'delete' => function ($url, $model, $key) {
                return \kartik\helpers\Html::a('<span class="glyphicon glyphicon-trash"></span>',
                    ['delete', 'id' => $key],
                    [
//                                'class' => 'btn btn-default btn-xs',
                        'data' => [
                            'confirm' => '你确定要删除吗？',
                        ],
                        'data-method' => 'post',
                    ]
                );
            },
        ],
    ],
];
echo \kartik\grid\GridView::widget([
//    'id' => 'test',
    'pjax'=>true,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $columns,
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
//        'hover'=>true,//鼠标移动上去时，颜色变色，默认为false
    'floatHeader'=>true,//向下滚动时，标题栏可以fixed，默认为false
    'showPageSummary'=>true,//显示统计栏，默认为false
    'condensed' => true,
    'bordered'=>true,
    'striped'=>true,
    'persistResize'=>true,
    'toolbar' => false,
    'panel' => [
        'type' => 'primary',
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . \kartik\helpers\Html::encode($this->title) . ' </h3>',
//        'before' => \kartik\helpers\Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
        'after' => \kartik\helpers\Html::a(\kartik\icons\Icon::show('repeat').' 刷新', ['index'], ['class' => 'btn btn-info']). " ".\kartik\helpers\Html::a(\kartik\icons\Icon::show('pencil-square-o').' 发布新文章', ['/user/story/publish'], ['class' => 'btn btn-primary']).
            '<div class="clearfix"></div>',
    ],
    'pager' => [
        'firstPageLabel' => "|<<",
        'prevPageLabel' => '<',
        'nextPageLabel' => '>',
        'lastPageLabel' => '>>|',
    ],
]);
?>
