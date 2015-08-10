<?php
/**
 * Date: 25.06.15
 * Time: 16:56
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\controllers;


use app\components\FrontendController;

class ProfileController extends FrontendController {

    public function actionIndex() {
        return $this->render("index.haml");
    }
}