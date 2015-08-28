<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%language_source}}".
 *
 * @property integer $id
 * @property string $category
 * @property string $message
 *
 * @property LanguageTranslate[] $languageTranslates
 * @property Language[] $languages
 */
class LanguageSource extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%language_source}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['category'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'category' => Yii::t('database', 'Category'),
            'message' => Yii::t('database', 'Message'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageTranslates()
    {
        return $this->hasMany(LanguageTranslate::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['language_id' => 'language'])->viaTable('{{%language_translate}}', ['id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\LanguageSourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\LanguageSourceQuery(get_called_class());
    }
}
