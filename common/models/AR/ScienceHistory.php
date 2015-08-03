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
use app\models\AQ\ScienceHistoryQuery;

/**
 * This is the model class for table "science_history".
 *
 * @property string $science
 * @property string $lang_code
 * @property string $attribute
 * @property string $was_to
 * @property string $become
 * @property integer $updated_at
 * @property string $updated_by
 *
 * @property Science $langCode
 * @property Science $science0
 * @property User $updatedBy
 */
class ScienceHistory extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'science_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['science', 'lang_code', 'attribute', 'was_to', 'become', 'updated_at', 'updated_by'], 'required'],
            [['was_to', 'become'], 'string'],
            [['updated_at'], 'integer'],
            [['science', 'lang_code', 'attribute', 'updated_by'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'science' => Yii::t('app', 'Science'),
            'lang_code' => Yii::t('app', 'Lang Code'),
            'attribute' => Yii::t('app', 'Attribute'),
            'was_to' => Yii::t('app', 'Was To'),
            'become' => Yii::t('app', 'Become'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLangCode()
    {
        return $this->hasOne(Science::className(), ['lang_code' => 'lang_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScience0()
    {
        return $this->hasOne(Science::className(), ['title' => 'science', 'lang_code' => 'lang_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['login' => 'updated_by']);
    }

    /**
     * @inheritdoc
     * @return \app\models\AQ\ScienceHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScienceHistoryQuery(get_called_class());
    }
}
