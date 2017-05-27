<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-27
 * Time: 上午9:21
 */

namespace frontend\modules\poster\controllers;


use common\models\Poster;
use common\models\PosterSubject;
use yii\data\Pagination;
use yii\web\Controller;

class SubjectController extends Controller
{
    public function actionView($id)
    {
        $subject = PosterSubject::findOne(['id'=>$id]);
        $query = Poster::find()->where(['poster_subject_id'=>$id])->orderBy(['created_at'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 10,
        ]);
        $posters = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('view', [
            'subject' => $subject,
            'posters' => $posters,
            'pages' => $pages,
        ]);
    }
}