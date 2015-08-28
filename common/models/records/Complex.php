<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%complex}}".
 *
 * @property integer $id
 * @property string $label
 * @property string $description
 * @property integer $rating
 * @property string $created_at
 * @property integer $created_by
 * @property integer $status
 *
 * @property User $createdBy
 * @property ComplexAssignment[] $complexAssignments
 */
class Complex extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%complex}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'label'], 'required'],
            [['id', 'rating', 'created_by', 'status'], 'integer'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['label'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'label' => Yii::t('database', 'Label'),
            'description' => Yii::t('database', 'Description'),
            'rating' => Yii::t('database', 'Rating'),
            'created_at' => Yii::t('database', 'Created At'),
            'created_by' => Yii::t('database', 'Created By'),
            'status' => Yii::t('database', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplexAssignments()
    {
        return $this->hasMany(ComplexAssignment::className(), ['complex_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\ComplexQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ComplexQuery(get_called_class());
    }
}
