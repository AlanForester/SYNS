<?php
/**
 * Date: 26.06.15
 * Time: 15:23
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\controllers;


use app\components\FrontendController;

class ScienceController extends FrontendController
{

    public function actionIndex($science)
    {
        return $this->render("index.haml",['model' => $science]);
    }

    public function actionCommon()
    {
        return $this->render("common.haml");
    }

}