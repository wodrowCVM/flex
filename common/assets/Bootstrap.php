<?php
/**
 * Created by PhpStorm.
 * User: Chang
 * Date: 2016/10/26
 * Time: 23:21
 */

namespace common\assets;


use yii\web\AssetBundle;

class Bootstrap extends AssetBundle
{
    public $css = [
        '//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap-theme.min.css',
        '//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css',
    ];

    public $js = [
        '//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js',
    ];
}