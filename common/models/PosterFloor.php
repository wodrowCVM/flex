<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-27
 * Time: 下午1:58
 */

namespace common\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;

/**
 * Class PosterFloor
 * @package common\models
 *
 * @property PosterFloor $atFloor
 * @property PosterFloor[] $posterFloors
 * @property User $createdBy
 * @property Poster $poster
 * @property User $updatedBy
 */
class PosterFloor extends \common\models\tables\PosterFloor
{
    const STATUS_ACTIVE = 10;

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
            'content' => '内容',
        ];
    }

    public function rules()
    {
        return [
            [['poster_id', 'floor_sequence', 'content'], 'required'],
            [['poster_id', 'floor_sequence', 'at_floor', 'created_by', 'created_at', 'updated_at', 'updated_by', 'status'], 'integer'],
            [['content'], 'string'],
            [['at_floor'], 'exist', 'skipOnError' => true, 'targetClass' => PosterFloor::className(), 'targetAttribute' => ['at_floor' => 'floor_sequence']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['poster_id'], 'exist', 'skipOnError' => true, 'targetClass' => Poster::className(), 'targetAttribute' => ['poster_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $user_info = UserInfo::findOne(['user_id'=>\Yii::$app->user->id]);
        if ($insert){
            $user_info->editInfoLevel(UserLevelRule::$update_rules['poster_reply_rule']);
        }
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

    public function getUrlArr()
    {
        $arr = ["/poster/poster/view", 'id'=>$this->id];
        return $arr;
    }

    public function getUrl()
    {
        $url = Url::to($this->getUrlArr());
        return $url;
    }
}