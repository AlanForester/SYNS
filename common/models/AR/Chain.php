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
use app\models\AQ\ChainQuery;

/**
 * This is the model class for table "chain".
 *
 * @property double $id
 * @property double $scheme_by
 * @property integer $status
 * @property string $science_by
 * @property string $essence_by
 * @property string $implement_of
 * @property integer $implement_rank
 * @property string $engine_of
 * @property integer $engine_rank
 * @property string $generation_to
 * @property integer $generation_rank
 * @property string $disintegration_to
 * @property integer $disintegration_rank
 *
 * @property Scheme $schemeBy
 * @property Science $scienceBy
 * @property Essence $disintegrationTo
 * @property Essence $engineOf
 * @property Essence $generationTo
 * @property Essence $implementOf
 * @property Essence $essenceBy
 * @property Essence $disintegrationTo0
 * @property Essence $engineOf0
 * @property Essence $generationTo0
 * @property Essence $implementOf0
 * @property Essence $essenceBy0
 * @property Essence $disintegrationTo1
 * @property Essence $engineOf1
 * @property Essence $essenceBy1
 * @property Essence $generationTo1
 * @property Essence $implementOf1
 * @property ChainHistory $chainHistory
 * @property Essence[] $essences
 * @property Essence $essence
 * @property Scheme[] $schemes
 */
class Chain extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'scheme_by', 'status', 'science_by'], 'required'],
            [['id', 'scheme_by'], 'number'],
            [['status', 'implement_rank', 'engine_rank', 'generation_rank', 'disintegration_rank'], 'integer'],
            [['science_by', 'essence_by', 'implement_of', 'engine_of', 'generation_to', 'disintegration_to'], 'string', 'max' => 255],
            [['scheme_by', 'science_by'], 'unique', 'targetAttribute' => ['scheme_by', 'science_by'], 'message' => 'The combination of Scheme By and Science By has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'scheme_by' => Yii::t('app', 'Scheme By'),
            'status' => Yii::t('app', 'Status'),
            'science_by' => Yii::t('app', 'Science By'),
            'essence_by' => Yii::t('app', 'Essence By'),
            'implement_of' => Yii::t('app', 'Implement Of'),
            'implement_rank' => Yii::t('app', 'Implement Rank'),
            'engine_of' => Yii::t('app', 'Engine Of'),
            'engine_rank' => Yii::t('app', 'Engine Rank'),
            'generation_to' => Yii::t('app', 'Generation To'),
            'generation_rank' => Yii::t('app', 'Generation Rank'),
            'disintegration_to' => Yii::t('app', 'Disintegration To'),
            'disintegration_rank' => Yii::t('app', 'Disintegration Rank'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchemeBy()
    {
        return $this->hasOne(Scheme::className(), ['degree' => 'scheme_by']);
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
    public function getDisintegrationTo()
    {
        return $this->hasOne(Essence::className(), ['title' => 'disintegration_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEngineOf()
    {
        return $this->hasOne(Essence::className(), ['title' => 'engine_of']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenerationTo()
    {
        return $this->hasOne(Essence::className(), ['title' => 'generation_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImplementOf()
    {
        return $this->hasOne(Essence::className(), ['title' => 'implement_of']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEssenceBy()
    {
        return $this->hasOne(Essence::className(), ['title' => 'essence_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisintegrationTo0()
    {
        return $this->hasOne(Essence::className(), ['title' => 'disintegration_to', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEngineOf0()
    {
        return $this->hasOne(Essence::className(), ['title' => 'engine_of', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenerationTo0()
    {
        return $this->hasOne(Essence::className(), ['title' => 'generation_to', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImplementOf0()
    {
        return $this->hasOne(Essence::className(), ['title' => 'implement_of', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEssenceBy0()
    {
        return $this->hasOne(Essence::className(), ['title' => 'essence_by', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisintegrationTo1()
    {
        return $this->hasOne(Essence::className(), ['title' => 'disintegration_to', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEngineOf1()
    {
        return $this->hasOne(Essence::className(), ['title' => 'engine_of', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEssenceBy1()
    {
        return $this->hasOne(Essence::className(), ['title' => 'essence_by', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenerationTo1()
    {
        return $this->hasOne(Essence::className(), ['title' => 'generation_to', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImplementOf1()
    {
        return $this->hasOne(Essence::className(), ['title' => 'implement_of', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChainHistory()
    {
        return $this->hasOne(ChainHistory::className(), ['chain_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEssences()
    {
        return $this->hasMany(Essence::className(), ['title' => 'essence_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEssence()
    {
        return $this->hasOne(Essence::className(), ['title' => 'essence_by', 'science_by' => 'science_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchemes()
    {
        return $this->hasMany(Scheme::className(), ['degree' => 'scheme_by']);
    }

    /**
     * @inheritdoc
     * @return \app\models\AQ\ChainQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChainQuery(get_called_class());
    }
}
