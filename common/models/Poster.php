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
 * Class Poster
 * @package common\models
 *
 * @property PosterSubject $posterSubject
 * @property User $createdBy
 * @property User $updatedBy
 * @property PosterFloor[] $posterFloors
 * @property PosterFloor $lastFloor
 */
class Poster extends \common\models\tables\Poster
{
    const STATUS_ACTIVE = 10;

    const TYPE_DEFAULT = 10;
    const TYPE_BOUTIQUE = 2;

    public static function getType()
    {
        return [
            self::TYPE_DEFAULT=>'默认贴',
            self::TYPE_BOUTIQUE => '精品贴',
        ];
    }

    const IS_TOP_FALSE = 0;
    const IS_TOP_TRUE = 1;

    public static function getIsTop()
    {
        return [
            self::IS_TOP_FALSE => '不置顶',
            self::IS_TOP_TRUE=>'置顶',
        ];
    }

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
            [['poster_subject_id', 'title'], 'required'],
            [['poster_subject_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status', 'type', 'is_top'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['desc'], 'string', 'max' => 500],
            [['poster_subject_id', 'title', 'created_by'], 'unique', 'targetAttribute' => ['poster_subject_id', 'title', 'created_by'], 'message' => 'The combination of Poster Subject ID, Title and Created By has already been taken.'],
            [['poster_subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => PosterSubject::className(), 'targetAttribute' => ['poster_subject_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $user_info = UserInfo::findOne(['user_id'=>\Yii::$app->user->id]);
        if ($insert){
            $user_info->editInfoLevel(UserLevelRule::$update_rules['poster_create_rule']);
            if ($this->type == self::TYPE_BOUTIQUE){
                $user_info->editInfoLevel(UserLevelRule::$update_rules['poster_add_boutique_rule']);
            }
        }else{
            if ($this->type == self::TYPE_BOUTIQUE && $changedAttributes['type'] != self::TYPE_BOUTIQUE){
                $user_info->editInfoLevel(UserLevelRule::$update_rules['poster_add_boutique_rule']);
            }
            if ($this->type != self::TYPE_BOUTIQUE && $changedAttributes['type'] == self::TYPE_BOUTIQUE){
                $user_info->editInfoLevel(UserLevelRule::$update_rules['poster_rm_boutique_rule']);
            }
        }
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

    /**
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getLastFloor()
    {
        $floor = PosterFloor::find()->where(['poster_id'=>$this->id])->orderBy(['created_at'=>SORT_DESC])->one();
        return $floor;
    }

    public function getFloorCount()
    {
        $count = PosterFloor::find()->where(['poster_id'=>$this->id])->count();
        return $count;
    }

    public function getFloorUserCount()
    {
        $count = PosterFloor::find()->where(['poster_id'=>$this->id])->groupBy(['created_by'])->count();
        return $count;
    }
}