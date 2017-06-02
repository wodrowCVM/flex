<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-2
 * Time: 下午1:31
 */

namespace common\models;


use yii\behaviors\TimestampBehavior;

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
}