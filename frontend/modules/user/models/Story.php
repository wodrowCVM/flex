<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午7:03
 */

namespace frontend\modules\user\models;


class Story extends \common\models\Story
{
    public function rules()
    {
        return [
            [['title', 'content', 'desc'], 'required'],
            [['content'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'need_level'], 'integer'],
            [['title'], 'string', 'max' => 25],
            [['desc'], 'string', 'max' => 50],
            [['title', 'created_by'], 'unique', 'targetAttribute' => ['title', 'created_by'], 'message' => 'The combination of Title and Created By has already been taken.'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }
}