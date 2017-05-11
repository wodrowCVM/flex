<?php

namespace frontend\modules\jour\controllers;

use yii\web\Controller;

/**
 * Default controller for the `jour` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 等级规则
     * @return string
     */
    public function actionLevelRule()
    {
        return $this->render('level-rule');
    }

    /**
     * 排行
     * @return string
     */
    public function actionTop()
    {
        return $this->render('top');
    }

    public function actionTodaySignIn()
    {
        return $this->render('today-sign-in');
    }
}
