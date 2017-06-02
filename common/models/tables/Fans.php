<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%fans}}".
 *
 * @property integer $id
 * @property integer $at_user
 * @property integer $follower
 * @property integer $created_at
 *
 * @property User $atUser
 * @property User $follower0
 */
class Fans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fans}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['at_user', 'follower', 'created_at'], 'required'],
            [['at_user', 'follower', 'created_at'], 'integer'],
            [['at_user', 'follower'], 'unique', 'targetAttribute' => ['at_user', 'follower'], 'message' => 'The combination of At User and Follower has already been taken.'],
            [['at_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['at_user' => 'id']],
            [['follower'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['follower' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'at_user' => 'At User',
            'follower' => 'Follower',
            'created_at' => 'Created At',
        ];
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
    public function getFollower0()
    {
        return $this->hasOne(User::className(), ['id' => 'follower']);
    }
}
