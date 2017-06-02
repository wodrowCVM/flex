<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-2
 * Time: 下午1:31
 */

namespace common\models;


use yii\behaviors\TimestampBehavior;

/**
 * Class Fans
 * @package common\models
 *
 * @property User $atUser
 * @property User $follower0
 */
class Fans extends \common\models\tables\Fans
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtUser()
    {
        return $this->hasOne(User::className(), ['id' => 'at_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFollower0()
    {
        return $this->hasOne(User::className(), ['id' => 'follower']);
    }
}