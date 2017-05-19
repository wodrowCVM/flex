<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-19
 * Time: 下午2:28
 */

namespace common\models;


use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * Class TalkReply
 * @package common\models
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property User $atUser
 */
class TalkReply extends \common\models\tables\TalkReply
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

    public function rules()
    {
        return [
            [['content'], 'required'],
            [['talk_id', 'at_user', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['content'], 'string', 'max' => 100],
            [['talk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Talk::className(), 'targetAttribute' => ['talk_id' => 'id']],
            [['at_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['at_user' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtUser()
    {
        return $this->hasOne(User::className(), ['id' => 'at_user']);
    }
}