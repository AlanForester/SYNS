<?php
/**
 * Date: 07.05.15
 * Time: 15:08
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace common\helpers;

use yii\helpers\Inflector;

/**
 * Class ConvertHelper
 * @package app\helpers
 */
class ConvertHelper
{

    /**
     * @param $string
     * @return string
     */
    public static function CamelCaseStringToEmail($string)
    {
        $id = Inflector::camel2id($string, '[]');
        $emailParts = explode('[]', $id);
        $email = NULL;
        if (isset($emailParts[0]) && isset($emailParts[1]) && isset($emailParts[2]))
            $email = $emailParts[0] . "@" . $emailParts[1] . "." . $emailParts[2];
        return $email;
    }
}