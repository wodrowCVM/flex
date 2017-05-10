<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-10
 * Time: 上午11:08
 */
?>

<?=\common\components\rewrite\Nav::widget([
    'items' => [
        [
            'label'=>'我的文章',
            'url'=>["/user/story"],
            'options' => ['class'=>"list-group-item"],
            'linkOptions'=>['class'=>"list-group"],
        ],
        [
            'label'=>'我的帖子',
            'url'=>["/user/commenting"],
            'options' => ['class'=>"list-group-item"],
            'linkOptions'=>['class'=>"list-group"],
        ],
    ],
    'options' => [
        'id'=>'user_items',
    ]
]) ?>
