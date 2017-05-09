<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%story_tag}}".
 *
 * @property integer $id
 * @property integer $tag_id
 * @property integer $story_id
 *
 * @property Tag $tag
 * @property Story $story
 */
class StoryTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%story_tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_id', 'story_id'], 'required'],
            [['tag_id', 'story_id'], 'integer'],
            [['tag_id', 'story_id'], 'unique', 'targetAttribute' => ['tag_id', 'story_id'], 'message' => 'The combination of Tag ID and Story ID has already been taken.'],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
            [['story_id'], 'exist', 'skipOnError' => true, 'targetClass' => Story::className(), 'targetAttribute' => ['story_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_id' => 'Tag ID',
            'story_id' => 'Story ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStory()
    {
        return $this->hasOne(Story::className(), ['id' => 'story_id']);
    }
}
