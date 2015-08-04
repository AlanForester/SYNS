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
use common\models\AQ\EssenceHistoryQuery;

/**
 * This is the model class for table "essence_history".
 *
 * @property double $essence_id
 * @property string $attribute
 * @property string $was_to
 * @property string $become
 * @property integer $updated_at
 * @property string $updated_by
 *
 * @property Essence $essence
 * @property User $updatedBy
 */
class EssenceHistory extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'essence_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['essence_id', 'attribute', 'was_to', 'become', 'updated_at', 'updated_by'], 'required'],
            [['essence_id'], 'number'],
            [['was_to', 'become'], 'string'],
            [['updated_at'], 'integer'],
            [['attribute', 'updated_by'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'essence_id' => Yii::t('app', 'Essence ID'),
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
    public function getEssence()
    {
        return $this->hasOne(Essence::className(), ['id' => 'essence_id']);
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
     * @return \common\models\AQ\EssenceHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EssenceHistoryQuery(get_called_class());
    }
}
