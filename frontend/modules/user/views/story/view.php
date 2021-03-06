<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-9
 * Time: 下午8:06
 */

/**
 * @var \yii\web\View $this
 * @var \common\models\Story $story
 */

use yii\widgets\DetailView;
//use kartik\detail\DetailView;


$this->title = "我的文章-".$story->title;
$this->params['breadcrumbs'][] = \yii\helpers\Html::a('文章列表', ['index']);
$this->params['breadcrumbs'][] = $this->title;
$model = $story;
$colors = ['primary', 'info', 'success', 'warning', 'danger'];
?>

<?php // $this->beginBlock('userLy1Left'); ?>
<?php // echo $this->render('/public/items') ?>
<?php // $this->endBlock(); ?>

<?php
echo DetailView::widget([
    'model'=>$model,
    'attributes'=>[
        'title',
        'content:raw',
        'created_at:datetime',
        'updated_at:datetime',
        [
            'label'=>'标签',
            'value'=>function()use($model, $colors){
                $x = "";
                foreach($model->tagArr as $k => $v){
                    $x .= '<a href="'.\common\models\Tag::getSearchUrlByName($v).'" class="label label-'.$colors[array_rand($colors, 1)].'">'.$v.'</a> ';
                }
                return $x;
            },
            'format'=>'raw',
        ],
        [
            'label'=>'操作',
            'value'=>function()use($model){
                $x = "";
                $x .= \dmstr\helpers\Html::a('修改', ["/user/story/update", 'id'=>$model->id], ['class'=>'btn btn-primary'])." ";
                $x .= \dmstr\helpers\Html::a('删除', ["/user/story/delete", 'id'=>$model->id], ['class'=>'btn btn-danger']);
                $x .= \dmstr\helpers\Html::a('在前台查看', ['/story/default/view', 'id'=>$model->id], ['class'=>'btn btn-info']);
                return $x;
            },
            'format'=>'raw',
        ],
    ],
]);
?>
