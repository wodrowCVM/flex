<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午4:17
 */

namespace common\models;

/**
 * Class UserSignIn
 * @package common\models
 *
 * @property User $user
 */
class UserSignIn extends \common\models\tables\UserSignIn
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert){
            $x = $this->countinously_days>20?20:$this->countinously_days;
            $rule = ['level'=>5+$x*5, 'integral'=>5+$x*5, 'treasure'=>1+$x, 'title' => '签到'];
            $user_info = UserInfo::findOne(['user_id'=>\Yii::$app->user->id]);
            $user_info->editInfoLevel($rule);
        }
    }
}