<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 下午5:29
 */

namespace common\models;


class Item extends \common\models\tables\Item
{
    const TYPE_STORY = 11;
    const TYPE_POSTER_SUBJECT = 12;

    public static function getType()
    {
        return [
            self::TYPE_STORY => '文章',
            self::TYPE_POSTER_SUBJECT => '帖子主题',
        ];
    }
}