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
}