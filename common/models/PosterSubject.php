<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-23
 * Time: 下午6:57
 */

namespace common\models;


use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;

/**
 * Class PosterSubject
 * @package common\models
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Poster $lastPoster
 */
class PosterSubject extends \common\models\tables\PosterSubject
{
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'updatedByAttribute' => false,
            ],
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    public function rules()
    {
        return [
            [['title',], 'required'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'status'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['desc'], 'string', 'max' => 500],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => "标题",
            'desc'=>'介绍',
        ];
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

    public function getUrlArr()
    {
        $arr = ["/poster/subject/view", 'id'=>$this->id];
        return $arr;
    }

    public function getUrl()
    {
        $url = Url::to($this->getUrlArr());
        return $url;
    }

    /**
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getLastPoster()
    {
        $poster = Poster::find()->where(['poster_subject_id'=>$this->id])->orderBy(['created_at'=>SORT_DESC])->one();
        return $poster;
    }

    public function getPosterCount()
    {
        $count = Poster::find()->where(['poster_subject_id'=>$this->id])->count();
        return $count;
    }

    public function getPosterUserCount()
    {
        $count = Poster::find()->where(['poster_subject_id'=>$this->id])->groupBy(['created_by'])->count();
        return $count;
    }
}