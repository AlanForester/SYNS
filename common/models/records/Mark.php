<?php

namespace common\models\records;

use Yii;

/**
 * This is the model class for table "{{%mark}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $lang_id
 * @property integer $pattern_id
 * @property string $description
 * @property string $image
 * @property integer $status
 * @property integer $rating
 * @property integer $is_supply
 * @property string $created_at
 * @property integer $created_by
 *
 * @property ComplexAssignment[] $complexAssignments
 * @property Pattern $pattern
 * @property User $createdBy
 * @property Language $lang
 * @property Tract[] $tracts
 * @property Tract[] $tracts0
 */
class Mark extends \common\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mark}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'lang_id', 'pattern_id', 'status', 'is_supply'], 'required'],
            [['id', 'pattern_id', 'status', 'rating', 'is_supply', 'created_by'], 'integer'],
            [['description', 'image'], 'string'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['lang_id'], 'string', 'max' => 5],
            [['title', 'lang_id'], 'unique', 'targetAttribute' => ['title', 'lang_id'], 'message' => 'The combination of Title and Lang ID has already been taken.']
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
            'lang_id' => Yii::t('database', 'Lang ID'),
            'pattern_id' => Yii::t('database', 'Pattern ID'),
            'description' => Yii::t('database', 'Description'),
            'image' => Yii::t('database', 'Image'),
            'status' => Yii::t('database', 'Status'),
            'rating' => Yii::t('database', 'Rating'),
            'is_supply' => Yii::t('database', 'Is Supply'),
            'created_at' => Yii::t('database', 'Created At'),
            'created_by' => Yii::t('database', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplexAssignments()
    {
        return $this->hasMany(ComplexAssignment::className(), ['mark_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPattern()
    {
        return $this->hasOne(Pattern::className(), ['id' => 'pattern_id']);
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
    public function getLang()
    {
        return $this->hasOne(Language::className(), ['language_id' => 'lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlphas()
    {
        return $this->hasMany(Tract::className(), ['alpha_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOmegas()
    {
        return $this->hasMany(Tract::className(), ['omega_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\MarkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\MarkQuery(get_called_class());
    }
}
