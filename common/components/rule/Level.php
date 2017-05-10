<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-10
 * Time: 下午6:06
 */

namespace common\components\rule;


use common\models\UserLevelRule;
use yii\base\Component;

class Level extends Component
{
    public static function getAllLevels()
    {
        $c = \Yii::$app->cache->get('all_user_level');
        if (!$c){
            $all = UserLevelRule::find()->all();
            \Yii::$app->cache->set('all_user_level', $all);
            $c = $all;
        }
        return $c;
    }

    public static function getUserLevelRule($user_level)
    {
        $all = self::getAllLevels();
        foreach ($all as $k => $v){
            if ($v->begin<=$user_level&&$v->end>=$user_level){
                return $v;
            }
        }
    }
}