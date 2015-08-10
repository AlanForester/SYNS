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

use app\components\FrontendController;
use Yii;

class ErrorController extends FrontendController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => '\yii\web\ErrorAction',
                'view' => 'index.haml',
            ],
        ];
    }

}
