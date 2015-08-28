<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $phone
 * @property string $name
 * @property string $surname
 * @property string $last_name
 * @property string $birthday
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
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Complex[] $complexes
 * @property History[] $histories
 * @property Mark[] $marks
 * @property Process[] $processes
 * @property Request[] $requests
 * @property Tract[] $tracts
 */
class User extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'email', 'password_hash'], 'required'],
            [['id', 'rating', 'status'], 'integer'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['email', 'name', 'surname', 'last_name', 'country', 'zone', 'city', 'area', 'street', 'build', 'flat', 'password_hash'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 64],
            [['auth_key', 'password_reset_token'], 'string', 'max' => 128],
            [['email'], 'unique'],
            [['phone'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'email' => Yii::t('database', 'Email'),
            'phone' => Yii::t('database', 'Phone'),
            'name' => Yii::t('database', 'Name'),
            'surname' => Yii::t('database', 'Surname'),
            'last_name' => Yii::t('database', 'Last Name'),
            'birthday' => Yii::t('database', 'Birthday'),
            'country' => Yii::t('database', 'Country'),
            'zone' => Yii::t('database', 'Zone'),
            'city' => Yii::t('database', 'City'),
            'area' => Yii::t('database', 'Area'),
            'street' => Yii::t('database', 'Street'),
            'build' => Yii::t('database', 'Build'),
            'flat' => Yii::t('database', 'Flat'),
            'auth_key' => Yii::t('database', 'Auth Key'),
            'password_hash' => Yii::t('database', 'Password Hash'),
            'password_reset_token' => Yii::t('database', 'Password Reset Token'),
            'rating' => Yii::t('database', 'Rating'),
            'status' => Yii::t('database', 'Status'),
            'created_at' => Yii::t('database', 'Created At'),
            'updated_at' => Yii::t('database', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplexes()
    {
        return $this->hasMany(Complex::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarks()
    {
        return $this->hasMany(Mark::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcesses()
    {
        return $this->hasMany(Process::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTracts()
    {
        return $this->hasMany(Tract::className(), ['created_by' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\UserQuery(get_called_class());
    }
}
