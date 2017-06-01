<?php

namespace common\models\tables;

use Yii;

/**
 * This is the model class for table "{{%poster_subject_tag}}".
 *
 * @property integer $id
 * @property integer $poster_subject_id
 * @property integer $tag_id
 *
 * @property PosterSubject $posterSubject
 * @property Tag $tag
 */
class PosterSubjectTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%poster_subject_tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poster_subject_id', 'tag_id'], 'required'],
            [['poster_subject_id', 'tag_id'], 'integer'],
            [['poster_subject_id', 'tag_id'], 'unique', 'targetAttribute' => ['poster_subject_id', 'tag_id'], 'message' => 'The combination of Poster Subject ID and Tag ID has already been taken.'],
            [['poster_subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => PosterSubject::className(), 'targetAttribute' => ['poster_subject_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
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
            'tag_id' => 'Tag ID',
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
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }
}
