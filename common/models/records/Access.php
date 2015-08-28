<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%access}}".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AccessRule $ruleName
 * @property AccessAssignment[] $accessAssignments
 * @property AccessLegacy[] $accessLegacies
 * @property AccessLegacy[] $accessLegacies0
 */
class Access extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%access}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('database', 'Name'),
            'type' => Yii::t('database', 'Type'),
            'description' => Yii::t('database', 'Description'),
            'rule_name' => Yii::t('database', 'Rule Name'),
            'data' => Yii::t('database', 'Data'),
            'created_at' => Yii::t('database', 'Created At'),
            'updated_at' => Yii::t('database', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(AccessRule::className(), ['name' => 'rule_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessAssignments()
    {
        return $this->hasMany(AccessAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessLegacies()
    {
        return $this->hasMany(AccessLegacy::className(), ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessLegacies0()
    {
        return $this->hasMany(AccessLegacy::className(), ['child' => 'name']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\AccessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\AccessQuery(get_called_class());
    }
}
