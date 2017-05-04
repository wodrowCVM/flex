<?php
namespace api\controllers;

/**
 * Site controller
 */
class SiteController extends \deepziyu\yii\rest\Controller
{
    /**
     * 首页
     * @desc homepage
     * @return string key key'value
     */
    public function actionIndex()
    {
        return [
            'key' => 'value',
        ];
    }

    /**
     * 测试1
     * @desc this is a desc
     * @param int $id 请求参数
     * @return int id id
     * @return string x x-id
     */
    public function actionTest1($id=1)
    {
        return [
            'id'=>$id,
            'x'=>"x-".$id,
        ];
    }
}
