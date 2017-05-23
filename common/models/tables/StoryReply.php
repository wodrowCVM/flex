<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%story_reply}}".
 *
 * @property integer $id
 * @property integer $story_id
 * @property integer $at_user
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property string $content
 *
 * @property Story $story
 * @property User $atUser
 * @property User $createdBy
 * @property User $updatedBy
 */
class StoryReply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%story_reply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['story_id', 'content'], 'required'],
            [['story_id', 'at_user', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['content'], 'string', 'max' => 100],
            [['story_id'], 'exist', 'skipOnError' => true, 'targetClass' => Story::className(), 'targetAttribute' => ['story_id' => 'id']],
            [['at_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['at_user' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'story_id' => 'Story ID',
            'at_user' => 'At User',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'content' => 'Content',
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