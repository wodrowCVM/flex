<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%item}}".
 *
 * @property integer $item_id
 * @property string $item_title
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $status
 * @property integer $type
 * @property integer $item_type
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status', 'type', 'item_type'], 'integer'],
            [['item_title'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'item_title' => 'Item Title',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'type' => 'Type',
            'item_type' => 'Item Type',
        ];
    }
}
