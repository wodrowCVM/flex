<?php

namespace api\modules\test\controllers;

use yii\web\Controller;

/**
 * Default controller for the `test` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return [
            'show'=>$this->render('index'),
        ];
    }
}
