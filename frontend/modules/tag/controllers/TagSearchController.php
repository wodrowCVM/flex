<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 下午5:34
 */

namespace frontend\modules\tag\controllers;


use common\models\ItemTag;
use frontend\modules\tag\models\Tag;
use yii\data\Pagination;
use yii\web\Controller;

class TagSearchController extends Controller
{
    public function actionSearch($id)
    {
        $tag = Tag::findOne(['id' => $id]);
        $query = ItemTag::find()->where(['status'=>10, 'tag_id'=>$tag->id])->orderBy(['created_at'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 10,
        ]);
        $items = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('search', [
            'tag' => $tag,
            'items' => $items,
            'pages' => $pages,
        ]);
    }
}