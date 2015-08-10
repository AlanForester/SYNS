<?php
/**
 * Date: 24.06.15
 * Time: 18:20
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\controllers;

use app\components\FrontendController;
use app\models\AR\Chain;
use Yii;

class MapController extends FrontendController {

    public function actionIndex() {
        return $this->render("index.haml");
    }

    public function actionCommon() {
        $maps = Chain::find()->all();
        return $this->render("common.haml",['maps' => $maps]);
    }

    public function actionScience() {
        return $this->render("science.haml");
    }

    public function actionEssence() {
        return $this->render("essence.haml");
    }
}