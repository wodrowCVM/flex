<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%user_info}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $nickname
 * @property string $avatar
 * @property integer $type
 * @property integer $level
 * @property integer $integral
 * @property integer $treasure
 * @property string $qq
 * @property string $mobile
 *
 * @property User $user
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'type', 'level', 'integral', 'treasure'], 'integer'],
            [['nickname', 'qq'], 'string', 'max' => 20],
            [['avatar'], 'string', 'max' => 50],
            [['mobile'], 'string', 'max' => 11],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nickname' => 'Nickname',
            'avatar' => 'Avatar',
            'type' => 'Type',
            'level' => 'Level',
            'integral' => 'Integral',
            'treasure' => 'Treasure',
            'qq' => 'Qq',
            'mobile' => 'Mobile',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
