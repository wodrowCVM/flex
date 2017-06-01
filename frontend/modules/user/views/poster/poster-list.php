<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午7:19
 */
/**
 * @var \frontend\modules\user\models\PosterSearch $searchModel
 */
$this->title = "帖子列表";
$this->params['breadcrumbs'][] = \yii\helpers\Html::a('主题列表', ['poster-subject-list']);
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$columns = [
    'id',
    'title',
    [
        'class' => \common\components\grid\KEnumColumn::className(),
        'attribute' => 'is_top',
        'enum' => $searchModel::getIsTop(),
    ],
    [
        'class' => \common\components\grid\KEnumColumn::className(),
        'attribute' => 'type',
        'enum' => $searchModel::getType(),
    ],
    [
        'attribute' => 'posterSubject.title',
        'label' => '主题',
    ],
    [
        'attribute' => 'createdBy.username',
        'label' => '创建者',
    ],
    [
        'attribute' => 'updatedBy.username',
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
                return \yii\helpers\Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['/poster/poster/view', 'id'=>$key], [
                    'class' => 'data-view',
                    'data-id' => $key,
                ]);
            },
            'update' => function($url, $modal, $key){
                return \yii\helpers\Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/user/poster/update-poster', 'poster_id'=>$key], [
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
                            'confirm' => '你确定要删除吗？将会删除此帖子下的所有内容！',
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
//    'showPageSummary'=>true,//显示统计栏，默认为false
    'condensed' => true,
    'bordered'=>true,
    'striped'=>true,
    'persistResize'=>true,
    'toolbar' => false,
    'panel' => [
        'type' => 'default',
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> ' . \kartik\helpers\Html::encode($this->title) . ' </h3>',
//        'before' => \kartik\helpers\Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
        'after' => \kartik\helpers\Html::a(\kartik\icons\Icon::show('repeat').' 刷新', ['poster-list'], ['class' => 'btn btn-info']). " ".\kartik\helpers\Html::a(\kartik\icons\Icon::show('pencil-square-o').' 创建新贴', ['/user/poster/create-poster'], ['class' => 'btn btn-primary']).
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
