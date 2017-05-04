<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/22
 * Time: 12:05
 */

namespace common\assets;


use yii\web\AssetBundle;

class Bsie extends AssetBundle
{
    public $basePath = "@static/bsie105/bootstrap";

    public $css = [
        'css/bootstrap-ie6.min.css',
        'css/ie.css',
    ];

    public $js = [
        'js/bootstrap-transition.js',
        'js/bootstrap-alert.js',
        'js/bootstrap-button.js',
        'js/bootstrap-carousel.js',
        'js/bootstrap-collapse.js',
        'js/bootstrap-dropdown.js',
        'js/bootstrap-modal.js',
        'js/bootstrap-scrollspy.js',
        'js/bootstrap-tab.js',
        'js/bootstrap-tooltip.js',
        'js/bootstrap-popover.js',
        'js/bootstrap-typeahead.js',
        'js/bootstrap-affix.js',
    ];

    public $jsOptions = [
        'condition' => 'lte IE 6'
    ];

    public $cssOptions = [
        'condition' => 'lte IE 6'
    ];
}