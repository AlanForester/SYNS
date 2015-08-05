<?php
/**
 * Date: 19.06.15
 * Time: 15:35
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace common\models\AR;

use Yii;
use common\components\ActiveRecord;
use common\models\AQ\UserQuery;

/**
 * This is the model class for table "user".
 *
 * @property string $login
 * @property string $email
 * @property string $phone
 * @property string $name
 * @property string $surname
 * @property string $last_name
 * @property integer $birthday
 * @property string $country
 * @property string $zone
 * @property string $city
 * @property string $area
 * @property string $street
 * @property string $build
 * @property string $flat
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $rating
 * @property integer $status
 * @property integer $access_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ChainHistory[] $chainHistories
 * @property Essence[] $essences
 * @property EssenceHistory[] $essenceHistories
 * @property Science[] $sciences
 * @property ScienceHistory[] $scienceHistories
 * @property Essence $login0
 * @property Science $login1
 * @property Access $access
 */
class User extends ActiveRecord
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['behaviorName'] = [
            'class' => 'yii\behaviors\TimestampBehavior',
        ];
        return $behaviors;
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'email', 'auth_key', 'password_hash', 'status', 'access_id'], 'required'],
            [['birthday', 'rating', 'status', 'access_id', 'created_at', 'updated_at'], 'integer'],
            [['login', 'email', 'phone', 'name', 'surname', 'last_name', 'country', 'zone', 'city', 'area', 'street', 'build', 'flat', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 128],
            [['name'], 'safe'],
            [['email'], 'unique'],
            [['login'], 'unique'],
            [['phone'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login' => Yii::t('app', 'Login'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'last_name' => Yii::t('app', 'Last Name'),
            'birthday' => Yii::t('app', 'Birthday'),
            'country' => Yii::t('app', 'Country'),
            'zone' => Yii::t('app', 'Zone'),
            'city' => Yii::t('app', 'City'),
            'area' => Yii::t('app', 'Area'),
            'street' => Yii::t('app', 'Street'),
            'build' => Yii::t('app', 'Build'),
            'flat' => Yii::t('app', 'Flat'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'rating' => Yii::t('app', 'Rating'),
            'status' => Yii::t('app', 'Status'),
            'access_id' => Yii::t('app', 'Access ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChainHistories()
    {
        return $this->hasMany(ChainHistory::className(), ['updated_by' => 'login']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEssences()
    {
        return $this->hasMany(Essence::className(), ['created_by' => 'login']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEssenceHistories()
    {
        return $this->hasMany(EssenceHistory::className(), ['updated_by' => 'login']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSciences()
    {
        return $this->hasMany(Science::className(), ['created_by' => 'login']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScienceHistories()
    {
        return $this->hasMany(ScienceHistory::className(), ['updated_by' => 'login']);
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
     * @return \common\models\AQ\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
