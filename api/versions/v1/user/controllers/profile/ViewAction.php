<?php
/**
 * Date: 06.05.15
 * Time: 22:25
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\versions\v1\user\controllers\profile;

use Yii;
use api\components\actions\ViewAction as BaseViewAction;

class ViewAction extends BaseViewAction {

    public function run() {
        return parent::run(Yii::$app->user->id);
    }

}