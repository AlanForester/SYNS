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

use frontend\components\FrontendController;
use Yii;

class DefaultController extends FrontendController
{

    public function actionIndex() {
        return $this->render('index.php');
    }

}
