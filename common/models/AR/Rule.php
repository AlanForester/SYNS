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
use app\models\AQ\RuleQuery;

/**
 * This is the model class for table "rule".
 *
 * @property string $title
 * @property integer $access_id
 * @property string $module
 * @property string $controller
 * @property string $action
 * @property integer $is_accept
 * @property string $except_condition
 * @property integer $status
 *
 * @property Access $access
 */
class Rule extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'access_id', 'module', 'controller', 'action', 'except_condition', 'status'], 'required'],
            [['access_id', 'is_accept', 'status'], 'integer'],
            [['except_condition'], 'string'],
            [['title', 'module', 'controller', 'action'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Yii::t('app', 'Title'),
            'access_id' => Yii::t('app', 'Access ID'),
            'module' => Yii::t('app', 'Module'),
            'controller' => Yii::t('app', 'Controller'),
            'action' => Yii::t('app', 'Action'),
            'is_accept' => Yii::t('app', 'Is Accept'),
            'except_condition' => Yii::t('app', 'Except Condition'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccess()
    {
        return $this->hasOne(Access::className(), ['id' => 'access_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\AQ\RuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RuleQuery(get_called_class());
    }
}
