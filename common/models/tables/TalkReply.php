<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%talk_reply}}".
 *
 * @property integer $id
 * @property integer $talk_id
 * @property integer $at_user
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property string $content
 *
 * @property Talk $talk
 * @property User $atUser
 * @property User $createdBy
 * @property User $updatedBy
 */
class TalkReply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%talk_reply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['talk_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'content'], 'required'],
            [['talk_id', 'at_user', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['content'], 'string', 'max' => 100],
            [['talk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Talk::className(), 'targetAttribute' => ['talk_id' => 'id']],
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
            'talk_id' => 'Talk ID',
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
    public function getTalk()
    {
        return $this->hasOne(Talk::className(), ['id' => 'talk_id']);
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
