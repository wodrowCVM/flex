<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%user_sign_in}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $date
 * @property integer $time
 * @property integer $countinously_days
 *
 * @property User $user
 */
class UserSignIn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_sign_in}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'date', 'time'], 'required'],
            [['user_id', 'date', 'time', 'countinously_days'], 'integer'],
            [['user_id', 'date'], 'unique', 'targetAttribute' => ['user_id', 'date'], 'message' => 'The combination of User ID and Date has already been taken.'],
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
            'date' => 'Date',
            'time' => 'Time',
            'countinously_days' => 'Countinously Days',
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
