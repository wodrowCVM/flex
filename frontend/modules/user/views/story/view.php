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

use yii\widgets\DetailView as DetailView;
//use kartik\detail\DetailView as DetailView;


$this->title = "我的文章-".$story->title;
$this->params['breadcrumbs'][] = $this->title;
$model = $story;
$colors = ['primary', 'info', 'success', 'warning', 'danger'];
?>

<?php $this->beginBlock('userLy1Left'); ?>
<?php // echo $this->render('/public/items') ?>
<?php $this->endBlock(); ?>

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
                    $x .= '<span class="label label-'.$colors[array_rand($colors, 1)].'">'.$v.'</span> ';
                }
                return $x;
            },
            'format'=>'raw',
        ],
        [
            'label'=>'操作',
            'value'=>function()use($model){
                return \dmstr\helpers\Html::a('修改', ["/user/story/update", 'id'=>$model->id], ['class'=>'btn btn-primary'])." ".\dmstr\helpers\Html::a('删除', ["/user/story/delete", 'id'=>$model->id], ['class'=>'btn btn-danger']);
            },
            'format'=>'raw',
        ],
    ],
]);
?>
