<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%language_translate}}".
 *
 * @property integer $id
 * @property string $language
 * @property string $translation
 *
 * @property Language $language0
 * @property LanguageSource $id0
 */
class LanguageTranslate extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%language_translate}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'language'], 'required'],
            [['id'], 'integer'],
            [['translation'], 'string'],
            [['language'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'language' => Yii::t('database', 'Language'),
            'translation' => Yii::t('database', 'Translation'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage0()
    {
        return $this->hasOne(Language::className(), ['language_id' => 'language']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(LanguageSource::className(), ['id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\LanguageTranslateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\LanguageTranslateQuery(get_called_class());
    }
}
