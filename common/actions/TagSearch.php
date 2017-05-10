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
                ->orderBy(['created_at'=>SORT_DESC])
                ->limit($this->limit);
            $command = $query->createCommand();
            $data = $command->queryAll();
//            $out['results'] = array_values($data);
//            var_dump($data);exit;
            $x = $out['results'];
            foreach ($data as $k => $v){
                $x[$k]['id'] = $v['text'];
                $x[$k]['text'] = $v['text'];
            }
//            var_dump(array_values($data));
//            echo "<br>";
//            var_dump($x);
//            exit;
            $x = array_values($x);
            $out['results'] = $x;
        }
        elseif ($this->id > 0) {
            $out['results'] = ['id' => $this->id, 'text' => Tag::findOne($this->id)->name];
        }
        return $out;
    }
}