<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 11/24/16
 * Time: 9:52 AM
 */

namespace common\assets;


use yii\web\AssetBundle;

class Datatables extends AssetBundle
{
    public $css = [
        '//cdn.bootcss.com/datatables/1.10.12/css/dataTables.bootstrap.min.css',
//        '//cdn.bootcss.com/datatables/1.10.12/css/dataTables.foundation.min.css',
    ];

    public $js = [
        '//cdn.bootcss.com/datatables/1.10.12/js/dataTables.bootstrap.min.js',
    ];
}