<?php

namespace frontend\modules\story\controllers;

use common\models\StoryReply;
use common\models\Story;
use yii\data\Pagination;
use yii\web\Controller;

/**
 * Default controller for the `story` module
 */
class DefaultController extends Controller
{
    private function getStory($id){
        return Story::find()->where(['id'=>$id])->one();
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query = Story::find()->orderBy(['created_at'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 10,
        ]);
        $storys = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'storys' => $storys,
            'pages' => $pages,
        ]);
    }

    public function actionView($id)
    {
        $story = $this->getStory($id);
        $x = new StoryReply();
        $story_reply = clone $x;
        $story_reply->story_id = $id;
        if ($story_reply->load(\Yii::$app->request->post())){
            if (\Yii::$app->user->isGuest){
                return $this->redirect(['/site/login']);
            }
            $story_reply->updated_by = \Yii::$app->user->id;
            if ($story_reply->save()){
                $this->redirect(['view', 'id'=>$id, 'is_save'=>1]);
                $story_reply = clone $x;
            }else{
                var_dump($story_reply->getErrors());exit;
            }
        }else{
            if (\Yii::$app->request->get('is_save')==1){}else{
                $story->view_count ++;
                $story->save();
            }
        }
        $query = StoryReply::find()->where(['story_id' => $story->id])->orderBy(['created_at'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 10,
        ]);
        $story_replys = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('view', [
            'story' => $story,
            'story_reply' => $story_reply,
            'story_replys' => $story_replys,
            'pages' => $pages,
        ]);
    }
}
