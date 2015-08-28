<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%access_assignment}}".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 *
 * @property Access $itemName
 */
class AccessAssignment extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%access_assignment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => Yii::t('database', 'Item Name'),
            'user_id' => Yii::t('database', 'User ID'),
            'created_at' => Yii::t('database', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(Access::className(), ['name' => 'item_name']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\AccessAssignmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\AccessAssignmentQuery(get_called_class());
    }
}
