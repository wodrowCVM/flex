<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/19 0019
 * Time: 09:59
 */

namespace common\assets;


use yii\web\AssetBundle;

class Sco extends AssetBundle
{
    public $css = [
        "//cdn.bootcss.com/sco.js/1.1.0/css/sco.message.min.css",
        "//cdn.bootcss.com/sco.js/1.1.0/css/scojs.min.css",
    ];

    public $js = [
        "//cdn.bootcss.com/sco.js/1.1.0/js/sco.ajax.min.js",
        "//cdn.bootcss.com/sco.js/1.1.0/js/sco.collapse.min.js",
        "//cdn.bootcss.com/sco.js/1.1.0/js/sco.confirm.min.js",
        "//cdn.bootcss.com/sco.js/1.1.0/js/sco.countdown.min.js",
        "//cdn.bootcss.com/sco.js/1.1.0/js/sco.message.min.js",
        "//cdn.bootcss.com/sco.js/1.1.0/js/sco.modal.min.js",
        "//cdn.bootcss.com/sco.js/1.1.0/js/sco.panes.min.js",
        "//cdn.bootcss.com/sco.js/1.1.0/js/sco.tab.min.js",
        "//cdn.bootcss.com/sco.js/1.1.0/js/sco.tooltip.min.js",
        "//cdn.bootcss.com/sco.js/1.1.0/js/sco.valid.min.js",
    ];
}