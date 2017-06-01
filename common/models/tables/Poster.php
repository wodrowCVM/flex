<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%poster}}".
 *
 * @property integer $id
 * @property integer $poster_subject_id
 * @property string $title
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $status
 * @property string $desc
 * @property integer $type
 *
 * @property PosterSubject $posterSubject
 * @property User $createdBy
 * @property User $updatedBy
 * @property PosterFloor[] $posterFloors
 */
class Poster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%poster}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poster_subject_id', 'title', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status'], 'required'],
            [['poster_subject_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status', 'type'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['desc'], 'string', 'max' => 500],
            [['poster_subject_id', 'title', 'created_by'], 'unique', 'targetAttribute' => ['poster_subject_id', 'title', 'created_by'], 'message' => 'The combination of Poster Subject ID, Title and Created By has already been taken.'],
            [['poster_subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => PosterSubject::className(), 'targetAttribute' => ['poster_subject_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'poster_subject_id' => 'Poster Subject ID',
            'title' => 'Title',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'desc' => 'Desc',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosterSubject()
    {
        return $this->hasOne(PosterSubject::className(), ['id' => 'poster_subject_id']);
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
    public function getPosterFloors()
    {
        return $this->hasMany(PosterFloor::className(), ['poster_id' => 'id']);
    }
}
