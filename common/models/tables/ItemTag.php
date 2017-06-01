<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%item_tag}}".
 *
 * @property string $name
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
class ItemTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%item_tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status', 'type', 'item_type'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['item_title'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
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
