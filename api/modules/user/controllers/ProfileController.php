<?php
/**
 * Date: 03.05.15
 * Time: 0:03
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\api\core\user\controllers;

use app\api\common\controllers\AuthActiveController;
use Yii;

class ProfileController extends AuthActiveController {

    public $modelClass = 'app\api\core\user\models\ProfileUser';

    public function actions() {
        $actions = parent::actions();
        $actions['view']['class'] = 'app\api\core\user\controllers\profile\ViewAction';
        $actions['update']['class'] = 'app\api\core\user\controllers\profile\UpdateAction';
        return $actions;
    }


}