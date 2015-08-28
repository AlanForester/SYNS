<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%pattern}}".
 *
 * @property integer $id
 * @property integer $measure
 * @property integer $degree
 * @property integer $x
 * @property integer $y
 * @property integer $z
 * @property double $angle_x
 * @property double $angle_y
 * @property double $angle_z
 * @property double $release
 * @property double $gravity
 * @property double $freq
 * @property double $flex
 * @property double $twist
 * @property double $length
 * @property double $size
 * @property double $weight
 *
 * @property Mark[] $marks
 */
class Pattern extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pattern}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'measure', 'degree', 'x', 'y', 'z', 'angle_x', 'angle_y', 'angle_z', 'release', 'gravity', 'freq', 'flex', 'twist', 'length', 'size', 'weight'], 'required'],
            [['id', 'measure', 'degree', 'x', 'y', 'z'], 'integer'],
            [['angle_x', 'angle_y', 'angle_z', 'release', 'gravity', 'freq', 'flex', 'twist', 'length', 'size', 'weight'], 'number'],
            [['x', 'y', 'z'], 'unique', 'targetAttribute' => ['x', 'y', 'z'], 'message' => 'The combination of X, Y and Z has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'measure' => Yii::t('database', 'Measure'),
            'degree' => Yii::t('database', 'Degree'),
            'x' => Yii::t('database', 'X'),
            'y' => Yii::t('database', 'Y'),
            'z' => Yii::t('database', 'Z'),
            'angle_x' => Yii::t('database', 'Angle X'),
            'angle_y' => Yii::t('database', 'Angle Y'),
            'angle_z' => Yii::t('database', 'Angle Z'),
            'release' => Yii::t('database', 'Release'),
            'gravity' => Yii::t('database', 'Gravity'),
            'freq' => Yii::t('database', 'Freq'),
            'flex' => Yii::t('database', 'Flex'),
            'twist' => Yii::t('database', 'Twist'),
            'length' => Yii::t('database', 'Length'),
            'size' => Yii::t('database', 'Size'),
            'weight' => Yii::t('database', 'Weight'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarks()
    {
        return $this->hasMany(Mark::className(), ['pattern_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\PatternQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\PatternQuery(get_called_class());
    }
}
