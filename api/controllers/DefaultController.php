<?php
/**
 * File: DefaultController.php
 * Date: 04.08.15
 * Project: TimeShift.in
 * Developer Alex Collin <alex@collin.su>
 * Copyright by "CleverTek LLC" 2014-2015
 */


namespace api\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex() {
        return $this->render("index");
    }
}