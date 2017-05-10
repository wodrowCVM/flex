<?php

namespace frontend\modules\story\controllers;

use frontend\modules\story\models\Story;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * Default controller for the `story` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query = Story::find();
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 2,
        ]);
        $storys = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'storys' => $storys,
            'pages' => $pages,
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }
}
