<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%story}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $need_level
 *
 * @property User $createdBy
 * @property StoryTag[] $storyTags
 * @property Tag[] $tags
 */
class Story extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%story}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['content'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'need_level'], 'integer'],
            [['title'], 'string', 'max' => 25],
            [['title', 'created_by'], 'unique', 'targetAttribute' => ['title', 'created_by'], 'message' => 'The combination of Title and Created By has already been taken.'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'need_level' => 'Need Level',
        ];
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
    public function getStoryTags()
    {
        return $this->hasMany(StoryTag::className(), ['story_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('{{%story_tag}}', ['story_id' => 'id']);
    }
}
