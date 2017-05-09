<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-9
 * Time: 下午9:01
 */

namespace common\actions;


use common\models\Tag;
use yii\base\Action;
use yii\db\Query;

class TagSearch extends Action
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
            $query->select('id, name AS text')
                ->from(Tag::tableName())
                ->where(['like', 'name', $this->search_name])
                ->limit($this->limit);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($this->id > 0) {
            $out['results'] = ['id' => $this->id, 'text' => Tag::findOne($this->id)->name];
        }
        return $out;
    }
}