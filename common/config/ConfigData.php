<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 下午3:18
 */

namespace common\config;


use common\models\User;

class ConfigData
{
    /**
     * @return User
     */
    public static function getSuper()
    {
        return User::findOne(['username'=>'wodrow']);
    }
}