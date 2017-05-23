<?php

namespace frontend\modules\talk\controllers;

use common\models\Talk;
use common\models\TalkPraise;
use common\models\TalkReply;
use frontend\modules\user\models\User;
use Psy\Exception\ErrorException;
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
        if ($talk_id = \Yii::$app->request->get('praise_talk_id')){
            if (!TalkPraise::findOne(['talk_id'=>$talk_id, 'created_by'=>\Yii::$app->user->id])){
                $talk_praise = new TalkPraise();
                $talk_praise->talk_id = $talk_id;
                $talk_praise->save();
            }
        }
        $talk_reply = new TalkReply();
        if (\Yii::$app->request->post('action')=='reply'){
            if (\Yii::$app->user->isGuest){
                $this->redirect(['/site/login']);
            }
            $post = \Yii::$app->request->post();
            $at_user = null;
            if (isset($post['at_user'])){
                $at_user = User::findOne(['id'=>$post['at_user']]);
            }
            $talk_reply->talk_id = $post['talk_id'];
            $string = $this->renderAjax('/public/quick_reply', ['talk_reply' => $talk_reply, 'at_user'=>$at_user, 'talk_id'=>$post['talk_id']]);
            return $string;
        }
        if ($talk_reply->load(\Yii::$app->request->post())){
            $talk_reply->updated_by = \Yii::$app->user->id;
            var_dump($talk_reply->toArray());
            if ($talk_reply->save()){}else{
                var_dump($talk_reply->getErrors());exit;
            }
        }
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
            'talk_reply' => $talk_reply,
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
        return $this->render('view', [
            'talk' => $talk,
            'talk_reply' => $talk_reply,
            'talk_replys' => $talk_replys,
            'pages' => $pages,
        ]);
    }
}
