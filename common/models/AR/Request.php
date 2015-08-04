<?php

namespace app\models\AR;

use Yii;
use app\components\ActiveRecord;
use common\models\AQ\RequestQuery;

/**
 * This is the model class for table "request".
 *
 * @property integer $id
 * @property string $message
 * @property string $email
 * @property string $image
 * @property string $title
 * @property string $description
 * @property integer $rank
 * @property integer $chain_id
 * @property string $approved_at
 * @property string $created_at
 * @property string $created_by
 *
 * @property User $createdBy
 */
class Request extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'description', 'created_by'], 'required'],
            [['message', 'description'], 'string'],
            [['rank', 'chain_id'], 'integer'],
            [['approved_at', 'created_at'], 'safe'],
            [['email', 'image', 'title', 'created_by'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'message' => Yii::t('app', 'Message'),
            'email' => Yii::t('app', 'Email'),
            'image' => Yii::t('app', 'Image'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'rank' => Yii::t('app', 'Rank'),
            'chain_id' => Yii::t('app', 'Chain ID'),
            'approved_at' => Yii::t('app', 'Approved At'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['login' => 'created_by']);
    }

    /**
     * @inheritdoc
     * @return \common\models\AQ\RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }
}
