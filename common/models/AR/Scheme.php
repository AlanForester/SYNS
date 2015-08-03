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
use app\models\AQ\SchemeQuery;

/**
 * This is the model class for table "scheme".
 *
 * @property double $degree
 * @property integer $x
 * @property integer $y
 * @property integer $z
 * @property double $angle_x_of_0
 * @property double $angle_y_of_0
 * @property double $angle_z_of_0
 * @property double $release
 * @property double $gravity
 * @property double $freq
 * @property double $flex
 * @property double $twist
 * @property double $length
 * @property double $size
 * @property double $weight
 *
 * @property Chain[] $chains
 * @property Chain $degree0
 */
class Scheme extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scheme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['degree', 'x', 'y', 'z'], 'required'],
            [['degree', 'angle_x_of_0', 'angle_y_of_0', 'angle_z_of_0', 'release', 'gravity', 'freq', 'flex', 'twist', 'length', 'size', 'weight'], 'number'],
            [['x', 'y', 'z'], 'integer'],
            [['x', 'y', 'z'], 'unique', 'targetAttribute' => ['x', 'y', 'z'], 'message' => 'The combination of X, Y and Z has already been taken.'],
            [['release', 'gravity', 'freq'], 'unique', 'targetAttribute' => ['release', 'gravity', 'freq'], 'message' => 'The combination of Release, Gravity and Freq has already been taken.'],
            [['angle_x_of_0', 'angle_y_of_0', 'angle_z_of_0'], 'unique', 'targetAttribute' => ['angle_x_of_0', 'angle_y_of_0', 'angle_z_of_0'], 'message' => 'The combination of Angle X Of 0, Angle Y Of 0 and Angle Z Of 0 has already been taken.'],
            [['flex', 'twist', 'length', 'size', 'weight'], 'unique', 'targetAttribute' => ['flex', 'twist', 'length', 'size', 'weight'], 'message' => 'The combination of Flex, Twist, Length, Size and Weight has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'degree' => Yii::t('app', 'Degree'),
            'x' => Yii::t('app', 'X'),
            'y' => Yii::t('app', 'Y'),
            'z' => Yii::t('app', 'Z'),
            'angle_x_of_0' => Yii::t('app', 'Angle X Of 0'),
            'angle_y_of_0' => Yii::t('app', 'Angle Y Of 0'),
            'angle_z_of_0' => Yii::t('app', 'Angle Z Of 0'),
            'release' => Yii::t('app', 'Release'),
            'gravity' => Yii::t('app', 'Gravity'),
            'freq' => Yii::t('app', 'Freq'),
            'flex' => Yii::t('app', 'Flex'),
            'twist' => Yii::t('app', 'Twist'),
            'length' => Yii::t('app', 'Length'),
            'size' => Yii::t('app', 'Size'),
            'weight' => Yii::t('app', 'Weight'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChains()
    {
        return $this->hasMany(Chain::className(), ['scheme_by' => 'degree']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDegree0()
    {
        return $this->hasOne(Chain::className(), ['scheme_by' => 'degree']);
    }

    /**
     * @inheritdoc
     * @return \app\models\AQ\SchemeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SchemeQuery(get_called_class());
    }
}
