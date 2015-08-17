<?php
/**
 * Date: 22.04.15
 * Time: 15:59
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace frontend\controllers;

use landing\components\LandingController;
use Yii;

class ErrorController extends LandingController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => '\yii\web\ErrorAction',
                'view' => 'index.php',
            ],
        ];
    }

}
