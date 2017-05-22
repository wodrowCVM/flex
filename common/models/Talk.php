<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-5-12
 * Time: 下午3:24
 */

namespace common\models;


use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Url;

/**
 * Class Talk
 * @package common\models
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property TalkReply[] $talkReplies
 * @property TalkReply[] $last10TalkReplies
 * @property TalkPraise[] $talkPraises
 */
class Talk extends \common\models\tables\Talk
{
    const SCENARIO_VIEW_COUNT = 'view_count';

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

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_VIEW_COUNT] = ['view_count'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['content'], 'string', 'max' => 200],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            ['view_count', 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'content' => 'Content',
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
    public function getTalkReplies()
    {
        return $this->hasMany(TalkReply::className(), ['talk_id' => 'id']);
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
        $arr = ["/talk/default/view", 'id' => $this->id];
        return $arr;
    }

    public function getUrl()
    {
        $url = Url::to($this->getUrlArr());
        return $url;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLast10TalkReplies()
    {
        return $this->hasMany(TalkReply::className(), ['talk_id' => 'id'])->orderBy(['created_at'=>SORT_DESC])->limit(10);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalkPraises()
    {
        return $this->hasMany(TalkPraise::className(), ['talk_id' => 'id']);
    }
}