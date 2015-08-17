<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.08.15
 * Time: 11:58
 */

namespace frontend\controllers;

use frontend\components\FrontendController;
use common\models\AR\Request;

class LandingController extends FrontendController
{
    public $layout = 'landing.php';

    public function actionIndex() {
        $requests = Request::find()->onLanding()->all();
        return $this->render('index.php',['requests' => $requests]);
    }
}