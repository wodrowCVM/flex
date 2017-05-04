<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 2017/3/25
 * Time: 15:57
 */

namespace api\modules\test\controllers;


use yii\rest\ActiveController;

class Test1Controller extends ActiveController
{
    public function actionTest1(){
        return [
            '1'=>'t1',
        ];
    }
}