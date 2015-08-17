<?php
/**
 * Date: 22.04.15
 * Time: 15:59
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */


namespace landing\controllers;

use common\models\AR\Request;
use landing\components\LandingController;
use Yii;

class DefaultController extends LandingController
{

    public function actionIndex() {
        $requests = Request::find()->onLanding()->all();
        return $this->render('index.php',['requests' => $requests]);
    }

}
