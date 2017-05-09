<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午6:46
 */

namespace frontend\modules\user\controllers;


use frontend\modules\user\models\Story;
use yii\base\ErrorException;
use yii\web\Controller;

class StoryController extends Controller
{
    private function getYouStory($id){
        $story = Story::findOne(['id'=>$id]);
        if (\Yii::$app->user->id!=$story->created_by){
            throw new ErrorException("不是你的文章！");
        }
        return $story;
    }

    /**
     * 发布文章
     * @return string
     */
    public function actionPublish()
    {
        $story = new Story();
        if ($story->load(\Yii::$app->request->post())){
            if ($story->save()){
                return $this->redirect(['/user/story/view', 'id' => $story->id]);
            }else{
                var_dump($story->getErrors());
            }
        }else {
            return $this->render('publish', [
                'story' => $story,
            ]);
        }
    }

    /**
     * 浏览个人文章
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $story = Story::findOne(['id'=>$id]);
        return $this->render('view', [
            'story' => $story,
        ]);
    }
}