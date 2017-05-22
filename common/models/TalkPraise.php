<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-22
 * Time: 上午9:09
 */

namespace common\models;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * Class TalkPraise
 * @package common\models
 *
 * @property Talk $talk
 * @property User $createdBy
 */
class TalkPraise extends \common\models\tables\TalkPraise
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
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['talk_id',], 'required'],
            [['talk_id', 'created_by', 'created_at'], 'integer'],
            [['talk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Talk::className(), 'targetAttribute' => ['talk_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['talk_id', 'created_by'], 'unique', 'targetAttribute' => ['talk_id', 'created_by'], 'message' => 'The combination of Talk ID and Created By has already been taken.'],
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