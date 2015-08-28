<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%request}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $email
 * @property string $image
 * @property integer $rating
 * @property string $approved_at
 * @property string $created_at
 * @property integer $created_by
 *
 * @property User $createdBy
 */
class Request extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%request}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title'], 'required'],
            [['id', 'rating', 'created_by'], 'integer'],
            [['description'], 'string'],
            [['approved_at', 'created_at'], 'safe'],
            [['title', 'email', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'title' => Yii::t('database', 'Title'),
            'description' => Yii::t('database', 'Description'),
            'email' => Yii::t('database', 'Email'),
            'image' => Yii::t('database', 'Image'),
            'rating' => Yii::t('database', 'Rating'),
            'approved_at' => Yii::t('database', 'Approved At'),
            'created_at' => Yii::t('database', 'Created At'),
            'created_by' => Yii::t('database', 'Created By'),
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
     * @inheritdoc
     * @return \common\models\queries\RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\RequestQuery(get_called_class());
    }
}
