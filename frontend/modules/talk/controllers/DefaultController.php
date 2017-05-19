<?php

namespace frontend\modules\talk\controllers;

use common\models\Talk;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * Default controller for the `talk` module
 */
class DefaultController extends Controller
{
    private function getTalk($id){
        return Talk::find()->where(['id'=>$id])->one();
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query = Talk::find()->orderBy(['created_at'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 10,
        ]);
        $talks = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'talks' => $talks,
            'pages' => $pages,
        ]);
    }

    public function actionView($id)
    {
        $talk = $this->getTalk($id);
        $talk->view_count ++;
        $talk->save();
        $talk_reply = new StoryReply();
        return $this->render('view', [
            'story' => $story,
            'story_reply' => $story_reply,
        ]);
    }
}
