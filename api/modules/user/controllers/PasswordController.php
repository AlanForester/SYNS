<?php
/**
 * Date: 21.06.15
 * Time: 17:58
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\api\core\user\controllers;


use app\api\common\controllers\ActiveController;
use Yii;
class PasswordController extends ActiveController
{
    
    public $modelClass = 'app\api\core\user\models\common\RestUser';


    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['class'] = 'app\api\core\user\controllers\password\RequestAction';
        $actions['update']['class'] = 'app\api\core\user\controllers\password\UpdateAction';
        return $actions;
    }


}