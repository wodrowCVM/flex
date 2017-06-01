<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 下午5:34
 */

namespace frontend\modules\tag\controllers;


use common\models\ItemTag;
use yii\web\Controller;

class TagSearchController extends Controller
{
    public function actionSearch($id)
    {
        $items = ItemTag::find()->where(['status'=>10, 'tag_id'=>$id])->all();
        return $this->render('search', [
            'items' => $items,
        ]);
    }
}