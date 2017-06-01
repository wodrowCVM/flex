<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 下午1:35
 */

namespace common\actions;


use common\models\PosterSubject;
use yii\base\Action;
use yii\db\Query;

class PosterSubjectSearch extends Action
{
    public $search_name;
    public $limit;
    public $id;

    public function run()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($this->search_name)) {
            $query = new Query();
            $query->select('id, title AS text')
                ->from(PosterSubject::tableName())
                ->where(['like', 'title', $this->search_name])
                ->orderBy(['created_at'=>SORT_DESC])
                ->limit($this->limit);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $x = $out['results'];
            foreach ($data as $k => $v){
                $x[$k]['id'] = $v['id'];
                $x[$k]['text'] = $v['text'];
            }
            $x = array_values($x);
            $out['results'] = $x;
        }
        elseif ($this->id > 0) {
            $out['results'] = ['id' => $this->id, 'text' => PosterSubject::findOne($this->id)->title];
        }
        return $out;
    }
}