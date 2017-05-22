<?php

namespace frontend\modules\talk\controllers;

use common\models\Talk;
use common\models\TalkPraise;
use common\models\TalkReply;
use frontend\modules\user\models\User;
use yii\data\Pagination;
use yii\filters\AccessControl;
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
        $talk_reply = new TalkReply();
        $talk_reply->talk_id = $talk->id;
        $talk_reply->updated_by = \Yii::$app->user->id;
        if ($talk_reply->load(\Yii::$app->request->post())){
            if ($talk_reply->save()){
                $this->redirect(['view', 'id'=>$id]);
            }else{
                \Yii::trace($talk_reply->getErrors(), 'wodrow');
            }
        }else{
            $talk->view_count ++;
            $talk->save();
        }
        $query = TalkReply::find()->where(['talk_id' => $talk->id])->orderBy(['created_at'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 10,
        ]);
        $talk_replys = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        \Yii::trace($talk_reply->toArray(), 'wodrow');
        return $this->render('view', [
            'talk' => $talk,
            'talk_reply' => $talk_reply,
            'talk_replys' => $talk_replys,
            'pages' => $pages,
        ]);
    }
}
