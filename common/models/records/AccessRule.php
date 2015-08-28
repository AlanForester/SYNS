<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%access_rule}}".
 *
 * @property string $name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Access[] $accesses
 */
class AccessRule extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%access_rule}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('database', 'Name'),
            'data' => Yii::t('database', 'Data'),
            'created_at' => Yii::t('database', 'Created At'),
            'updated_at' => Yii::t('database', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesses()
    {
        return $this->hasMany(Access::className(), ['rule_name' => 'name']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\AccessRuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\AccessRuleQuery(get_called_class());
    }
}
