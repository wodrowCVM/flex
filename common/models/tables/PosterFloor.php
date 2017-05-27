<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%poster_floor}}".
 *
 * @property integer $id
 * @property integer $poster_id
 * @property integer $floor_sequence
 * @property integer $at_floor
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $status
 * @property string $content
 *
 * @property PosterFloor $atFloor
 * @property PosterFloor[] $posterFloors
 * @property User $createdBy
 * @property Poster $poster
 * @property User $updatedBy
 */
class PosterFloor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%poster_floor}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poster_id', 'floor_sequence', 'created_by', 'created_at', 'updated_at', 'updated_by', 'status', 'content'], 'required'],
            [['poster_id', 'floor_sequence', 'at_floor', 'created_by', 'created_at', 'updated_at', 'updated_by', 'status'], 'integer'],
            [['content'], 'string'],
            [['at_floor'], 'exist', 'skipOnError' => true, 'targetClass' => PosterFloor::className(), 'targetAttribute' => ['at_floor' => 'floor_sequence']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['poster_id'], 'exist', 'skipOnError' => true, 'targetClass' => Poster::className(), 'targetAttribute' => ['poster_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'poster_id' => 'Poster ID',
            'floor_sequence' => 'Floor Sequence',
            'at_floor' => 'At Floor',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtFloor()
    {
        return $this->hasOne(PosterFloor::className(), ['floor_sequence' => 'at_floor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosterFloors()
    {
        return $this->hasMany(PosterFloor::className(), ['at_floor' => 'floor_sequence']);
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
    public function getPoster()
    {
        return $this->hasOne(Poster::className(), ['id' => 'poster_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
