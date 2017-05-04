<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/22
 * Time: 11:52
 */

namespace common\assets;


use yii\web\AssetBundle;

class IeCompatible extends AssetBundle
{
    public $css = [

    ];

    public $js = [
        '//cdn.bootcss.com/html5shiv/r29/html5.min.js',
        '//cdn.bootcss.com/respond.js/1.4.2/respond.min.js',
    ];

    public $jsOptions = [
        'condition'=>'lt IE 9'
    ];

    public $cssOptions = [
        'condition'=>'lt IE 9'
    ];

    public $depends = [
        'common\assets\Bsie'
    ];
}