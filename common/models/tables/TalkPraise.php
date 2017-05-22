<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%talk_praise}}".
 *
 * @property integer $id
 * @property integer $talk_id
 * @property integer $created_by
 * @property integer $created_at
 *
 * @property Talk $talk
 * @property User $createdBy
 */
class TalkPraise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%talk_praise}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['talk_id', 'created_by', 'created_at'], 'required'],
            [['talk_id', 'created_by', 'created_at'], 'integer'],
            [['talk_id', 'created_by'], 'unique', 'targetAttribute' => ['talk_id', 'created_by'], 'message' => 'The combination of Talk ID and Created By has already been taken.'],
            [['talk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Talk::className(), 'targetAttribute' => ['talk_id' => 'id']],
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
            'talk_id' => 'Talk ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
