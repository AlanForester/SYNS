<?php
/**
 * Date: 19.06.15
 * Time: 15:35
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace common\models\AR;

use Yii;
use common\components\ActiveRecord;
use common\models\AQ\LangQuery;

/**
 * This is the model class for table "lang".
 *
 * @property string $code
 * @property string $title
 * @property string $flag
 * @property integer $rating
 * @property integer $status
 *
 * @property Science $code0
 * @property Science[] $sciences
 */
class Lang extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'title', 'status'], 'required'],
            [['flag'], 'string'],
            [['rating', 'status'], 'integer'],
            [['code', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'title' => Yii::t('app', 'Title'),
            'flag' => Yii::t('app', 'Flag'),
            'rating' => Yii::t('app', 'Rating'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCode0()
    {
        return $this->hasOne(Science::className(), ['lang_code' => 'code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSciences()
    {
        return $this->hasMany(Science::className(), ['lang_code' => 'code']);
    }

    /**
     * @inheritdoc
     * @return \common\models\AQ\LangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LangQuery(get_called_class());
    }
}
