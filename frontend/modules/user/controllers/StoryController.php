<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午6:46
 */

namespace frontend\modules\user\controllers;


use frontend\modules\user\models\Story;
use yii\web\Controller;

class StoryController extends Controller
{
    /**
     * 发布文章
     * @return string
     */
    public function actionPublish()
    {
        $model = new Story();
        if ($model->load(\Yii::$app->request->post())){
            if ($model->save()){
                return $this->redirect(['/story/default/view', 'id' => $model->id]);
            }else{
                var_dump($model->getErrors());
            }
        }else {
            return $this->render('publish', [
                'model' => $model,
            ]);
        }
    }
}