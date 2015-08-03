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
use app\models\AQ\EssenceQuery;

/**
 * This is the model class for table "essence".
 *
 * @property double $id
 * @property string $title
 * @property string $science_by
 * @property string $description
 * @property string $image
 * @property integer $status
 * @property integer $rating
 * @property integer $created_at
 * @property string $created_by
 *
 * @property Chain[] $chains
 * @property Chain[] $chains0
 * @property Chain[] $chains1
 * @property Chain[] $chains2
 * @property Chain[] $chains3
 * @property Chain[] $chains4
 * @property Chain[] $chains5
 * @property Chain[] $chains6
 * @property Chain[] $chains7
 * @property Chain[] $chains8
 * @property Chain[] $chains9
 * @property Chain[] $chains10
 * @property Chain[] $chains11
 * @property Chain[] $chains12
 * @property Chain[] $chains13
 * @property Chain $title0
 * @property Chain $title1
 * @property User $createdBy
 * @property Science $scienceBy
 * @property EssenceHistory $essenceHistory
 * @property User $user
 */
class Essence extends ActiveRecord
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['behaviorName'] = [
            'class' => 'yii\behaviors\TimestampBehavior',
        ];
        return $behaviors;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'essence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'science_by'], 'required'],
            [['status'],'default', 'value' => 1],
            [['id'], 'number'],
            [['description', 'image'], 'string'],
            [['status', 'rating', 'created_at'], 'integer'],
            [['title', 'science_by', 'created_by'], 'string', 'max' => 255],
            [['title', 'science_by'], 'unique', 'targetAttribute' => ['title', 'science_by'], 'message' => 'The combination of Title and Science By has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'science_by' => Yii::t('app', 'Science By'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'rating' => Yii::t('app', 'Rating'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains()
    {
        return $this->hasMany(Chain::className(), ['disintegration_to' => 'title']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains0()
    {
        return $this->hasMany(Chain::className(), ['engine_of' => 'title']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains1()
    {
        return $this->hasMany(Chain::className(), ['generation_to' => 'title']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains2()
    {
        return $this->hasMany(Chain::className(), ['implement_of' => 'title']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains3()
    {
        return $this->hasMany(Chain::className(), ['essence_by' => 'title']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains4()
    {
        return $this->hasMany(Chain::className(), ['disintegration_to' => 'title', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains5()
    {
        return $this->hasMany(Chain::className(), ['engine_of' => 'title', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains6()
    {
        return $this->hasMany(Chain::className(), ['generation_to' => 'title', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains7()
    {
        return $this->hasMany(Chain::className(), ['implement_of' => 'title', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains8()
    {
        return $this->hasMany(Chain::className(), ['essence_by' => 'title', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains9()
    {
        return $this->hasMany(Chain::className(), ['disintegration_to' => 'title', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains10()
    {
        return $this->hasMany(Chain::className(), ['engine_of' => 'title', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains11()
    {
        return $this->hasMany(Chain::className(), ['essence_by' => 'title', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains12()
    {
        return $this->hasMany(Chain::className(), ['generation_to' => 'title', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains13()
    {
        return $this->hasMany(Chain::className(), ['implement_of' => 'title', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitle0()
    {
        return $this->hasOne(Chain::className(), ['essence_by' => 'title']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitle1()
    {
        return $this->hasOne(Chain::className(), ['essence_by' => 'title', 'science_by' => 'science_by']);
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
    public function getScienceBy()
    {
        return $this->hasOne(Science::className(), ['title' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEssenceHistory()
    {
        return $this->hasOne(EssenceHistory::className(), ['essence_id' => 'id']);
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
     * @return \app\models\AQ\EssenceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EssenceQuery(get_called_class());
    }
}
