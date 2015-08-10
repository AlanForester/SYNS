<?php
/**
 * Date: 26.06.15
 * Time: 15:22
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\controllers;


use app\components\FrontendController;

class EssenceController extends FrontendController {

    public function actionIndex($essence,$science) {
        return $this->render("index.haml");
    }
}