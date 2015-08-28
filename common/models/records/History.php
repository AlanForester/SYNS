<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%history}}".
 *
 * @property string $table
 * @property string $attribute
 * @property string $was_to
 * @property string $become
 * @property string $operation
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property User $updatedBy
 */
class History extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%history}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table', 'attribute', 'was_to', 'become', 'operation'], 'required'],
            [['was_to', 'become', 'operation'], 'string'],
            [['updated_at'], 'safe'],
            [['updated_by'], 'integer'],
            [['table', 'attribute'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'table' => Yii::t('database', 'Table'),
            'attribute' => Yii::t('database', 'Attribute'),
            'was_to' => Yii::t('database', 'Was To'),
            'become' => Yii::t('database', 'Become'),
            'operation' => Yii::t('database', 'Operation'),
            'updated_at' => Yii::t('database', 'Updated At'),
            'updated_by' => Yii::t('database', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\HistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\HistoryQuery(get_called_class());
    }
}
