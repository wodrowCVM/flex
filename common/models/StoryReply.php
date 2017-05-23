<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-14
 * Time: 上午11:49
 */

namespace common\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * Class StoryReply
 * @package common\models
 *
 * @property Story $story
 * @property User $atUser
 * @property User $createdBy
 * @property User $updatedBy
 */
class StoryReply extends \common\models\tables\StoryReply
{
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStory()
    {
        return $this->hasOne(Story::className(), ['id' => 'story_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtUser()
    {
        return $this->hasOne(User::className(), ['id' => 'at_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}