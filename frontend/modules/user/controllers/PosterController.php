<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午6:31
 */

namespace frontend\modules\user\controllers;


use common\config\ConfigData;
use common\models\PosterSubjectTag;
use common\models\Tag;
use frontend\modules\user\models\Poster;
use frontend\modules\user\models\PosterSearch;
use frontend\modules\user\models\PosterSubject;
use frontend\modules\user\models\PosterSubjectSearch;
use yii\base\ErrorException;
use yii\db\Exception;
use yii\filters\VerbFilter;
use yii\web\Controller;

class PosterController extends Controller
{
    public function behaviors()
    {
        $b = parent::behaviors(); // TODO: Change the autogenerated stub
        $b['verbs'] = [
            'class' => VerbFilter::className(),
            'actions' => [
                'delete' => ['POST'],
            ],
        ];
        return $b;
    }

    protected function transSaveSubject(PosterSubject $subject)
    {
        $trans = \Yii::$app->db->beginTransaction();
        try{
            if ($subject->save()){
                PosterSubjectTag::deleteAll(['poster_subject_id'=>$subject->id]);
                $tag = new Tag();
                $subject_tag = new PosterSubjectTag();
                foreach ($subject->tagArr as $k => $v){
                    $t = Tag::findOne(['name'=>$v]);
                    if (!$t){
                        $t = clone $tag;
                        $t->name = $v;
                        $t->created_at = $t->updated_at = time();
                        $t->created_by = $t->updated_by = \Yii::$app->user->id;
                        $t->save();
                    }
                    $m = clone $subject_tag;
                    $m->poster_subject_id = $subject->id;
                    $m->tag_id = $t->id;
                    $m->save();
                }
            }
            $trans->commit();
            $this->redirect('poster-subject-list');
        }catch (Exception $e){
            $trans->rollBack();
            throw $e;
        }
    }

    protected function getSubject($id)
    {
        if (\Yii::$app->user->id == ConfigData::getSuper()->id){
            $x = PosterSubject::findOne(['id'=>$id]);
        }else{
            $x = PosterSubject::findOne(['id'=>$id, 'created_by'=>\Yii::$app->user->id]);
        }
        if ($x){
            return $x;
        }else{
            throw new ErrorException('没有找到主题或不是你的主题');
        }
    }

    protected function getPoster($id)
    {
        if (\Yii::$app->user->id == ConfigData::getSuper()->id){
            $x = Poster::findOne(['id'=>$id]);
        }else{
            $x = Poster::findOne(['id'=>$id, 'created_by'=>\Yii::$app->user->id]);
        }
        if ($x){
            return $x;
        }else{
            throw new ErrorException('没有找到帖子或不是你的帖子');
        }
    }

    protected function transSavePoster(Poster $poster)
    {
        $trans = \Yii::$app->db->beginTransaction();
        try{
            if ($poster->save()){}else{
                var_dump($poster->getErrors());exit;
            }
            $trans->commit();
            $this->redirect(['poster-list']);
        }catch (ErrorException $e){
            $trans->rollBack();
        }
    }

    public function actionIndex()
    {
//        return $this->render('index');
        return $this->redirect(['poster-subject-list']);
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
            $poster_subject->status = $poster_subject::STATUS_ACTIVE;
            $this->transSaveSubject($poster_subject);
        }
        return $this->render('create-subject', [
            'poster_subject'=>$poster_subject,
        ]);
    }

    public function actionUpdateSubject($subject_id)
    {
        $x = $this->getSubject($subject_id);
        $poster_subject = clone $x;
        if ($poster_subject->load(\Yii::$app->request->post())){
            $this->transSaveSubject($poster_subject);
        }
        return $this->render('update-subject', [
            'poster_subject'=>$poster_subject,
        ]);
    }

    public function actionDeleteSubject($subject_id)
    {
        $x = $this->getSubject($subject_id);
        if (PosterSubject::deleteAll(['id'=>$subject_id])){
            $this->redirect(['poster-subject-list']);
        }else{
            var_dump("ee");exit;
        }
    }

    public function actionCreatePoster()
    {
        $x = new Poster();
        $poster = clone $x;
        if ($subject_id = \Yii::$app->request->get('subject_id')){
            $poster->poster_subject_id = $subject_id;
        }
        if ($poster->load(\Yii::$app->request->post())){
            $poster->updated_by = \Yii::$app->user->id;
            $poster->status = $poster::STATUS_ACTIVE;
            $this->transSavePoster($poster);
        }
        return $this->render('create-poster', [
            'poster'=>$poster,
        ]);
    }

    public function actionUpdatePoster($poster_id)
    {
        $x = $this->getPoster($poster_id);
        $poster = clone $x;
        if ($poster->load(\Yii::$app->request->post())){
            $poster->updated_by = \Yii::$app->user->id;
            $this->transSavePoster($poster);
        }
        return $this->render('update-poster', [
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