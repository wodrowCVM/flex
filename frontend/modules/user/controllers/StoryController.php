<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午6:46
 */

namespace frontend\modules\user\controllers;


use common\models\StoryTag;
use common\models\Tag;
use frontend\modules\user\models\Story;
use yii\base\ErrorException;
use yii\db\Exception;
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
            $trans = \Yii::$app->db->beginTransaction();
            try{
                if ($story->save()){
                    StoryTag::deleteAll(['story_id'=>$story->id]);
                    $tag = new Tag();
                    $story_tag = new StoryTag();
                    foreach ($story->tagArr as $k => $v){
                        $t = Tag::findOne(['name'=>$v]);
                        if (!$t){
                            $t = clone $tag;
                            $t->name = $v;
                            $t->created_at = $t->updated_at = time();
                            $t->created_by = $t->updated_by = \Yii::$app->user->id;
                            $t->save();
                        }
                        $m = clone $story_tag;
                        $m->story_id = $story->id;
                        $m->tag_id = $t->id;
                        $m->save();
                    }
                }
                $trans->commit();
                return $this->redirect(['/user/story/view', 'id' => $story->id]);
            }catch (Exception $e){
                $trans->rollBack();
                var_dump($e->getMessage());
            }
        }else {
            return $this->render('publish', [
                'story' => $story,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $story = Story::findOne(['id'=>$id]);
        return $this->render('update', [
            'story' => $story,
        ]);
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