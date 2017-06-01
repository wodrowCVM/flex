<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 17-6-1
 * Time: 上午11:23
 */

namespace common\models;

/**
 * Class PosterSubjectTag
 * @package common\models
 *
 * @property PosterSubject $posterSubject
 * @property Tag $tag
 */
class PosterSubjectTag extends \common\models\tables\PosterSubjectTag
{
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