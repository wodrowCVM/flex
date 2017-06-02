<?php

namespace frontend\modules\user\controllers;

use common\models\Fans;
use common\models\User;
use yii\base\ErrorException;
use yii\db\Exception;
use yii\web\Controller;

/**
 * Default controller for the `user` module
 */
class DefaultController extends Controller
{
    public $layout = "ly2";

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMemberInfo()
    {
        $this->layout = "ly2";
        return $this->render('member-info');
    }

    public function actionAtt($follower, $at_user, $undo=0)
    {
        if ($follower == $at_user){
            throw new ErrorException("不能对自己操作", 1053);
        }
        $fans = Fans::findOne(['at_user'=>$at_user, 'follower'=>$follower]);
        if ($undo){
            Fans::deleteAll(['at_user'=>$at_user, 'follower'=>$follower]);
        }else{
            if (!$fans){
                $fans = new Fans([
                    'follower' => $follower,
                    'at_user' => $at_user,
                    'created_at' => time(),
                ]);
                $trans = \Yii::$app->db->beginTransaction();
                try{
                    $fans->save();
                    $trans->commit();
                }catch (Exception $e){
                    $trans->rollBack();
                    throw $e;
                }
            }
        }
        $this->redirect(['member-info', 'member-id'=>$at_user]);
    }
}
