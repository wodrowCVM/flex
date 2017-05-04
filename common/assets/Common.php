<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 2017/2/23
 * Time: 22:01
 */

namespace common\assets;


use kartik\icons\FontAwesomeAsset;
use yii\web\AssetBundle;

class Common extends AssetBundle
{
    public function init()
    {
        parent::init();
        $this->depends = array_merge($this->depends, [
            Lodash::className(),
//            FontAwesomeAsset::className(),
        ]);
    }
}