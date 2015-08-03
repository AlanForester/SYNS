<?php
/**
 * Date: 19.06.15
 * Time: 15:35
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\models\AR;

use Yii;
use app\components\ActiveRecord;
use app\models\AQ\ScienceQuery;

/**
 * This is the model class for table "science".
 *
 * @property string $title
 * @property string $lang_code
 * @property string $description
 * @property integer $rating
 * @property integer $status
 * @property integer $created_at
 * @property string $created_by
 *
 * @property Chain[] $chains
 * @property Essence[] $essences
 * @property Lang $lang
 * @property User $createdBy
 * @property Lang $langCode
 * @property ScienceHistory[] $scienceHistories
 * @property ScienceHistory $scienceHistory
 * @property User $user
 */
class Science extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'science';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'lang_code', 'status', 'created_at', 'created_by'], 'required'],
            [['description'], 'string'],
            [['rating', 'status', 'created_at'], 'integer'],
            [['title', 'lang_code', 'created_by'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('app', 'Title'),
            'lang_code' => Yii::t('app', 'Lang Code'),
            'description' => Yii::t('app', 'Description'),
            'rating' => Yii::t('app', 'Rating'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains()
    {
        return $this->hasMany(Chain::className(), ['science_by' => 'title']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEssences()
    {
        return $this->hasMany(Essence::className(), ['science_by' => 'title']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['code' => 'lang_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['login' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLangCode()
    {
        return $this->hasOne(Lang::className(), ['code' => 'lang_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScienceHistories()
    {
        return $this->hasMany(ScienceHistory::className(), ['lang_code' => 'lang_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScienceHistory()
    {
        return $this->hasOne(ScienceHistory::className(), ['science' => 'title', 'lang_code' => 'lang_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['login' => 'created_by']);
    }

    /**
     * @inheritdoc
     * @return \app\models\AQ\ScienceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScienceQuery(get_called_class());
    }
}
