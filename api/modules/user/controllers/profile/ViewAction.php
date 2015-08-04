<?php
/**
 * Date: 06.05.15
 * Time: 22:25
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\api\core\user\controllers\profile;
use Yii;

class ViewAction extends \app\api\common\actions\ViewAction {

    public function run() {
        return parent::run(Yii::$app->user->id);
    }

}