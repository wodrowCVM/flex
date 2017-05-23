<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午6:02
 */

namespace frontend\assets\poster;


use yii\web\AssetBundle;

class Poster extends AssetBundle
{
    public $basePath = '@webroot/css/poster/';
    public $baseUrl = '@web/css/poster/';
    public $css = [
        'poster.less',
    ];
}