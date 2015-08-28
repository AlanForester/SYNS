<?php
/**
 * Date: 28.08.15
 * Time: 17:06
 * Project: SYNS
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace frontend\controllers;


use common\models\records\Mark;
use frontend\components\FrontendController;

class ObjectController extends FrontendController
{
    public function actionIndex($object) {
        $model = Mark::findOne(['title' => $object]);
        return $this->render('index',['mark' => $model]);
    }
}