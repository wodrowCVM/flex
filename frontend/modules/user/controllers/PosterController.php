<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午6:31
 */

namespace frontend\modules\user\controllers;


use common\models\Poster;
use common\models\PosterFloor;
use common\models\PosterSubject;
use frontend\modules\user\models\PosterSearch;
use frontend\modules\user\models\PosterSubjectSearch;
use yii\base\ErrorException;
use yii\web\Controller;

class PosterController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPosterSubjectList()
    {
        $searchModel = new PosterSubjectSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->getQueryParams());
        return $this->render('poster-subject-list', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreateSubject()
    {
        $x = new PosterSubject();
        $poster_subject = clone $x;
        if ($poster_subject->load(\Yii::$app->request->post())){
            $poster_subject->updated_by = \Yii::$app->user->id;
            if ($poster_subject->save()){
//                $poster_subject = clone $x;
                $this->redirect(['poster-subject-list']);
            }else{
                var_dump($poster_subject->getErrors());exit;
            }
        }
        return $this->render('create-subject', [
            'poster_subject'=>$poster_subject,
        ]);
    }

    public function actionCreatePoster($subject_id)
    {
        $x = new \frontend\modules\user\models\Poster();
        $poster = clone $x;
        $poster->poster_subject_id = $subject_id;
        if ($poster->load(\Yii::$app->request->post())){
            $trans = \Yii::$app->db->beginTransaction();
            try{
                $poster->updated_by = \Yii::$app->user->id;
                $poster->status = $poster::STATUS_ACTIVE;
                if ($poster->save()){}else{
                    var_dump($poster->getErrors());exit;
                }
                $trans->commit();
                $this->redirect(['poster-list']);
            }catch (ErrorException $e){
                $trans->rollBack();
            }
        }
        return $this->render('create-poster', [
            'poster'=>$poster,
        ]);
    }

    public function actionPosterList()
    {
        $searchModel = new PosterSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->getQueryParams());
        return $this->render('poster-list', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}