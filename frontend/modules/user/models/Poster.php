<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午7:23
 */

namespace frontend\modules\user\models;


use common\models\PosterFloor;

class Poster extends \common\models\Poster
{
    public $floor_head_content;

    public function rules()
    {
        return [
            [['poster_subject_id', 'title'], 'required'],
            [['poster_subject_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status', 'type', 'is_top'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['desc'], 'string', 'max' => 500],
            [['poster_subject_id', 'title', 'created_by'], 'unique', 'targetAttribute' => ['poster_subject_id', 'title', 'created_by'], 'message' => 'The combination of Poster Subject ID, Title and Created By has already been taken.'],
            [['poster_subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => PosterSubject::className(), 'targetAttribute' => ['poster_subject_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            ['floor_head_content', 'required'],
            ['floor_head_content', 'string', 'max' => 500],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'poster_subject_id' => '所属主题',
            'title' => '标题',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'desc' => '介绍',
            'floor_head_content' => '顶楼内容',
            'type' => '类型',
            'is_top' => '置顶',
        ];
    }

    public function afterFind()
    {
        parent::afterFind();
        $x = PosterFloor::findOne(['poster_id'=>$this->id, 'floor_sequence'=>0]);
        $this->floor_head_content = $x->content;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert){
            $poster_floor = new PosterFloor();
            $poster_floor->poster_id = $this->id;
            $poster_floor->floor_sequence = 0;
            $poster_floor->content = $this->floor_head_content;
            $poster_floor->updated_by = \Yii::$app->user->id;
            $poster_floor->status = $poster_floor::STATUS_ACTIVE;
            if ($poster_floor->save()){}else{
                var_dump($poster_floor->getErrors());exit;
            }
        }
    }
}