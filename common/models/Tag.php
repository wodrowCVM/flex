<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-9
 * Time: 下午9:09
 */

namespace common\models;


use yii\helpers\Url;

class Tag extends \common\models\tables\Tag
{
    public function getSearchUrlArr()
    {
        $arr = ["/tag/tag-search/search", 'id' => $this->id];
        return $arr;
    }

    public function getSearchUrl()
    {
        $url = Url::to($this->getSearchUrlArr());
        return $url;
    }
}