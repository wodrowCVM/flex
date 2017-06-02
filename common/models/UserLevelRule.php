<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-7
 * Time: 上午10:15
 */

namespace common\models;


class UserLevelRule extends \common\models\tables\UserLevelRule
{
    const MAX_INT = 4294967295;
    const MAX_LEVEL = 4294967295;

    public static $update_rules = [
        'story_publish_rule' => ['level'=>50, 'integral'=>25, 'treasure'=>20, 'title' => '发布文章'],
        'poster_create_rule' => ['level'=>20, 'integral'=>10, 'treasure'=>10, 'title' => '发布帖子'],
        'poster_add_boutique_rule' => ['level'=>100, 'integral'=>50, 'treasure'=>30, 'title' => '帖子加精'],
        'poster_rm_boutique_rule' => ['level'=>-90, 'integral'=>-40, 'treasure'=>-20, 'title' => '帖子取消加精'],
        'poster_reply_rule' => ['level'=>5, 'integral'=>5, 'treasure'=>5, 'title' => '帖子回复'],
        'talk_publish_rule' => ['level'=>5, 'integral'=>5, 'treasure'=>5, 'title' => '发布说说'],
    ];
}