<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午7:23
 */

namespace frontend\modules\user\models;


class PosterSubject extends \common\models\PosterSubject
{
    public function rules()
    {
        return [
            [['title', 'tagArr'], 'required'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'status', 'type', 'is_top'], 'integer'],
            [['title'], 'string', 'max' => 8],
            [['desc'], 'string', 'max' => 500],
            [['title'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => "标题",
            'desc'=>'介绍',
            'tagArr' => '标签',
            'type' => '类型',
            'is_top' => '置顶',
        ];
    }
}