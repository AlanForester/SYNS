<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%access_legacy}}".
 *
 * @property string $parent
 * @property string $child
 *
 * @property Access $parent0
 * @property Access $child0
 */
class AccessLegacy extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%access_legacy}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => Yii::t('database', 'Parent'),
            'child' => Yii::t('database', 'Child'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Access::className(), ['name' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0()
    {
        return $this->hasOne(Access::className(), ['name' => 'child']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\AccessLegacyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\AccessLegacyQuery(get_called_class());
    }
}
