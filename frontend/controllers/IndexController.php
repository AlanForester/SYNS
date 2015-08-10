<?php
/**
 * Date: 22.04.15
 * Time: 15:59
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */


namespace app\controllers;

use app\components\FrontendController;
use app\models\AR\Request;
use Yii;

class IndexController extends FrontendController
{
    public $layout = 'landing.haml';

    public function actionIndex() {
        $requests = Request::find()->onLanding()->all();
        return $this->render('index.haml',['requests' => $requests]);
    }

}
