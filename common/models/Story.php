<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-8
 * Time: 下午6:26
 */

namespace common\models;


use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * Class Story
 * @package common\models
 *
 * @property User $user
 * @property array $tagArr
 */
class Story extends \common\models\tables\Story
{
    public $tagArr;

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'updatedByAttribute' => false,
            ],
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'title' => '标题',
            'content' => '内容',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'tagArr' => '标签',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return array $tagArr
     */
    public function getTagArr()
    {
        $arr = [];
        $tags = $this->tags;
        foreach($tags as $k => $v){
            $arr[$v->id] = $v->name;
        }
        return $arr;
    }
}