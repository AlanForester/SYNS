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
use lajax\translatemanager\models\Language as BaseLanguage;
use common\models\AQ\LanguageQuery;

/**
 * This is the model class for table "lang".
 *
 * @property string $code
 * @property string $title
 * @property string $flag
 * @property integer $rating
 * @property integer $status
 *
 * @property Science $code0
 * @property Science[] $sciences
 */
class Language extends BaseLanguage
{
    public static function find()
    {
        return new LanguageQuery(get_called_class());
    }
}
