<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 下午5:34
 */

namespace frontend\modules\tag\controllers;


use yii\web\Controller;

class TagSearchController extends Controller
{
    public function actionSearch()
    {
        return $this->render('search');
    }
}