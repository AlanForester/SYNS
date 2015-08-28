<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%language}}".
 *
 * @property string $language_id
 * @property string $language
 * @property string $country
 * @property string $name
 * @property string $name_ascii
 * @property integer $status
 * @property integer $sort
 *
 * @property LanguageTranslate[] $languageTranslates
 * @property LanguageSource[] $ids
 * @property Mark[] $marks
 */
class Language extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%language}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'language', 'country', 'name', 'name_ascii', 'status'], 'required'],
            [['status', 'sort'], 'integer'],
            [['language_id'], 'string', 'max' => 5],
            [['language', 'country'], 'string', 'max' => 3],
            [['name', 'name_ascii'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => Yii::t('database', 'Language ID'),
            'language' => Yii::t('database', 'Language'),
            'country' => Yii::t('database', 'Country'),
            'name' => Yii::t('database', 'Name'),
            'name_ascii' => Yii::t('database', 'Name Ascii'),
            'status' => Yii::t('database', 'Status'),
            'sort' => Yii::t('database', 'Sort'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageTranslates()
    {
        return $this->hasMany(LanguageTranslate::className(), ['language' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(LanguageSource::className(), ['id' => 'id'])->viaTable('{{%language_translate}}', ['language' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarks()
    {
        return $this->hasMany(Mark::className(), ['lang_id' => 'language_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\LanguageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\LanguageQuery(get_called_class());
    }
}
