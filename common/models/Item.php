<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 下午5:29
 */

namespace common\models;


use yii\base\ErrorException;
use yii\helpers\Url;

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

    public function getUrlArr()
    {
        switch ($this->item_type){
            case self::TYPE_STORY:
                $arr = ["/story/default/view", 'id'=>$this->item_id];
                break;
            case self::TYPE_POSTER_SUBJECT:
                $arr = ["/poster/subject/view", 'id'=>$this->item_id];
                break;
            default:
                throw new ErrorException("没有类型", 1052);
                break;
        }
        return $arr;
    }

    public function getUrl()
    {
        $url = Url::to($this->getUrlArr());
        return $url;
    }

    public function getUpdateUrlArr()
    {
        switch ($this->item_type){
            case self::TYPE_STORY:
                $arr = ["/user/story/update", 'id'=>$this->item_id];
                break;
            case self::TYPE_POSTER_SUBJECT:
                $arr = ["/user/poster/update-subject", 'subject_id'=>$this->item_id];
                break;
            default:
                throw new ErrorException("没有类型", 1052);
                break;
        }
        return $arr;
    }

    public function getUpdateUrl()
    {
        $url = Url::to($this->getUpdateUrlArr());
        return $url;
    }
}