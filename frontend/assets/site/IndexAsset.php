<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 2017/2/23
 * Time: 20:47
 */

namespace frontend\assets\site;

use kartik\base\AssetBundle;

class IndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site/index.less',
    ];
    public $js = [
        'js/site/index.js'
    ];
}