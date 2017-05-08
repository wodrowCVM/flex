<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-6
 * Time: 下午4:58
 */

namespace frontend\modules\user\controllers;

use yii\web\Controller;

class SettingController extends Controller
{
    public function actionIndex()
    {
        $user = \Yii::$app->user->identity;
        $user_info = $user->userInfo;
        if ($user->load(\Yii::$app->request->post())&&$user_info->load(\Yii::$app->request->post())){
            $user->save();
            $user_info->save();
        }
        return $this->render('index', [
            'user' => $user,
            'user_info' => $user_info,
        ]);
    }
}