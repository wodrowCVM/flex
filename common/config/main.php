<?php
$config = [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::className(),
        ],
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'datecontrol' => [
            'class' => \kartik\datecontrol\Module::className(),
            // see settings on http://demos.krajee.com/datecontrol#module
        ],
        // If you use tree table
        'treemanager' =>  [
            'class' => \kartik\tree\Module::className(),
            // see settings on http://demos.krajee.com/tree-manager#module
        ],
        'dynagrid'=>[
            'class'=>\kartik\dynagrid\Module::className(),
            // other settings (refer documentation)
        ],
    ],
];

return $config;
