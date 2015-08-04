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
use common\models\AQ\ChainHistoryQuery;
/**
 * This is the model class for table "chain_history".
 *
 * @property double $chain_id
 * @property string $attribute
 * @property string $was_to
 * @property string $become
 * @property integer $updated_at
 * @property string $updated_by
 *
 * @property Chain $chain
 * @property User $updatedBy
 */
class ChainHistory extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chain_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chain_id', 'attribute', 'was_to', 'become', 'updated_at', 'updated_by'], 'required'],
            [['chain_id'], 'number'],
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
            'chain_id' => Yii::t('app', 'Chain ID'),
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
    public function getChain()
    {
        return $this->hasOne(Chain::className(), ['id' => 'chain_id']);
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
     * @return \common\models\AQ\ChainHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChainHistoryQuery(get_called_class());
    }
}
