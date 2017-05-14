<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%story_reply}}".
 *
 * @property integer $id
 * @property integer $at_id
 * @property integer $time
 * @property string $content
 *
 * @property User $at
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
            [['at_id', 'time', 'content'], 'required'],
            [['at_id', 'time'], 'integer'],
            [['content'], 'string', 'max' => 500],
            [['at_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['at_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'at_id' => 'At ID',
            'time' => 'Time',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAt()
    {
        return $this->hasOne(User::className(), ['id' => 'at_id']);
    }
}
