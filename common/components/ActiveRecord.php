<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */
namespace common\components;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\web\HttpException;

class ActiveRecord extends \yii\db\ActiveRecord
{

    public $shield = [
        'default' => []
    ];

    protected $protectedAttributes = [];
    protected $hiddenAttributes = [];


    public function init()
    {
        if (!is_array($this->shield))
            throw new HttpException(500, Yii::t('app', "Param scenarios must be array."));
        foreach ($this->shield as $scenario => $attributes) {
            $this->protectedAttributes[$scenario] = [];
            if (!is_array($attributes))
               throw new HttpException(500, Yii::t('app', "Key 'attributes' must be array in the 'scenarios' param."));
            foreach ($attributes as $attribute => $visible) {
                array_push($this->protectedAttributes[$scenario],$attribute);
                if (!$visible) {
                    if(substr($attribute,0,1) == '!') {
                        array_push($this->hiddenAttributes,substr($attribute, 1, strlen($attribute)));
                    } else {
                        array_push($this->hiddenAttributes,$attribute);
                    }
                }

            }
        }
        return parent::init();
    }


    public function scenarios()
    {
        //$scenarios = parent::scenarios(); //TODO: Set Shield for each model its ok!
        return $this->protectedAttributes;

    }

    public function fields()
    {
        $fields = parent::fields();
        foreach ($this->hiddenAttributes as $attribute) {
            if (in_array($attribute, $this->attributes))
                unset($fields[$attribute]);
        }
        return $fields;
    }

    public function beforeSave($insert)
    {
        return parent::beforeSave($insert);
    }
}