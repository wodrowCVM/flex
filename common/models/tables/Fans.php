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
}
