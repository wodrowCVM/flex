<?php

namespace frontend\modules\poster\controllers;

use frontend\modules\user\models\PosterSubject;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * Default controller for the `poster` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query = PosterSubject::find()->orderBy(['created_at'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 10,
        ]);
        $subjects = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index', [
            'subjects' => $subjects,
            'pages' => $pages,
        ]);
    }
}
