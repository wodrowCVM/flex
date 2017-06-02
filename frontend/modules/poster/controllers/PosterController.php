<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-27
 * Time: 上午9:22
 */

namespace frontend\modules\poster\controllers;


use common\models\PosterFloor;
use frontend\modules\user\models\Poster;
use yii\data\Pagination;
use yii\web\Controller;

class PosterController extends Controller
{
    public function actionView($id)
    {
        $poster = Poster::findOne(['id'=>$id]);
        $x = new PosterFloor();
        $post_floor = clone $x;
        $query = PosterFloor::find()->where(['poster_id'=>$id])->orderBy(['floor_sequence'=>SORT_ASC,'created_at'=>SORT_DESC]);
        if ($post_floor->load(\Yii::$app->request->post())){
            if (\Yii::$app->user->isGuest){
                return $this->redirect(['/site/login']);
            }
            $post_floor->poster_id = $id;
            $y = clone $query;
            $c = $y->count();
            $post_floor->floor_sequence = $c;
            $post_floor->status = $post_floor::STATUS_ACTIVE;
            $post_floor->updated_by = \Yii::$app->user->id;
            if ($post_floor->save()){
                $this->redirect(['view', 'id'=>$id, 'is_save'=>1]);
            }else{
                var_dump($post_floor->getErrors());exit;
            }
        }else{}
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 10,
        ]);
        $floors = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('view', [
            'poster' => $poster,
            'floors' => $floors,
            'pages' => $pages,
            'poster_floor' => $post_floor,
        ]);
    }
}