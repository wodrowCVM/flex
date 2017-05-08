<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%user_level_rule}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $begin
 * @property integer $end
 * @property string $avatar_rule
 */
class UserLevelRule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_level_rule}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'begin', 'end'], 'required'],
            [['begin', 'end'], 'integer'],
            [['avatar_rule'], 'string'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'begin' => 'Begin',
            'end' => 'End',
            'avatar_rule' => 'Avatar Rule',
        ];
    }
}