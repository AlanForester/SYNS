<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%tract}}".
 *
 * @property integer $id
 * @property integer $alpha_id
 * @property integer $omega_id
 * @property integer $process_id
 * @property integer $rating
 * @property integer $is_supply
 * @property string $created_at
 * @property integer $created_by
 * @property integer $status
 *
 * @property Mark $alpha
 * @property Mark $omega
 * @property Process $process
 * @property User $createdBy
 */
class Tract extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tract}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'alpha_id', 'omega_id', 'process_id', 'rating', 'is_supply'], 'required'],
            [['id', 'alpha_id', 'omega_id', 'process_id', 'rating', 'is_supply', 'created_by', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['alpha_id', 'omega_id', 'process_id'], 'unique', 'targetAttribute' => ['alpha_id', 'omega_id', 'process_id'], 'message' => 'The combination of Alpha ID, Omega ID and Process ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'alpha_id' => Yii::t('database', 'Alpha ID'),
            'omega_id' => Yii::t('database', 'Omega ID'),
            'process_id' => Yii::t('database', 'Process ID'),
            'rating' => Yii::t('database', 'Rating'),
            'is_supply' => Yii::t('database', 'Is Supply'),
            'created_at' => Yii::t('database', 'Created At'),
            'created_by' => Yii::t('database', 'Created By'),
            'status' => Yii::t('database', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlpha()
    {
        return $this->hasOne(Mark::className(), ['id' => 'alpha_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOmega()
    {
        return $this->hasOne(Mark::className(), ['id' => 'omega_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcess()
    {
        return $this->hasOne(Process::className(), ['id' => 'process_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\TractQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\TractQuery(get_called_class());
    }
}
