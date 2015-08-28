<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%complex_assignment}}".
 *
 * @property integer $complex_id
 * @property integer $mark_id
 * @property integer $status
 * @property integer $rating
 *
 * @property Complex $complex
 * @property Mark $mark
 */
class ComplexAssignment extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%complex_assignment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['complex_id', 'mark_id', 'status', 'rating'], 'required'],
            [['complex_id', 'mark_id', 'status', 'rating'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'complex_id' => Yii::t('database', 'Complex ID'),
            'mark_id' => Yii::t('database', 'Mark ID'),
            'status' => Yii::t('database', 'Status'),
            'rating' => Yii::t('database', 'Rating'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplex()
    {
        return $this->hasOne(Complex::className(), ['id' => 'complex_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMark()
    {
        return $this->hasOne(Mark::className(), ['id' => 'mark_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\ComplexAssignmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ComplexAssignmentQuery(get_called_class());
    }
}
