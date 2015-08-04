<?php
/**
 * File: RuleManager.php
 * Date: 04.08.15
 * Project: TimeShift.in
 * Developer Alex Collin <alex@collin.su>
 * Copyright by "CleverTek LLC" 2014-2015
 */


namespace api\components;

use Yii;
use GlobIterator;
use HttpRuntimeException;
use yii\helpers\ArrayHelper;

class UrlRuleManager
{

    /**
     * @return array
     * @throws HttpRuntimeException
     */
    public static function getRulesConfig()
    {
        $rules = [];
        foreach (new GlobIterator(dirname(__DIR__) . '/config/modules/*') as $item) {
            $rule = require($item);
            if ($item->isFile()) {
                $rules = ArrayHelper::merge($rule,$rules);
            }
        }
        return $rules;
    }

}