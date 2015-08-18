<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.08.15
 * Time: 15:01
 */

namespace landing\widgets;


class ActiveForm extends \yii\widgets\ActiveForm
{
    public $fieldClass = 'landing\widgets\ActiveField';
}