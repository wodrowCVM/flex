<?php

namespace frontend\assets;

use common\assets\Bootstrap;
use common\assets\Common;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/global.less',
        'css/site.less',
        'css/navbar.less',
        'css/float_button.less',
    ];
    public $js = [
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public function init()
    {
        parent::init();
        $this->depends = array_merge($this->depends, [
            Common::className(),
            YiiAsset::className(),
            Bootstrap::className(),
        ]);
    }
}
