<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/28 0028
 * Time: 16:21
 */

namespace common\assets;


use yii\web\AssetBundle;

class VideoJs extends AssetBundle
{
    public $css = [
        '//vjs.zencdn.net/5.8/video-js.min.css',
    ];

    public $js = [
        '//vjs.zencdn.net/5.8/video.min.js',
    ];
}