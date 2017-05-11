<?php

namespace frontend\modules\user\controllers;

use common\models\User;
use yii\web\Controller;

/**
 * Default controller for the `user` module
 */
class DefaultController extends Controller
{
    public $layout = "ly2";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
//        echo 12345;
        return $this->render('index');
    }

    public function actionMemberInfo()
    {
        $this->layout = "ly2";
        return $this->render('member-info');
    }
}
