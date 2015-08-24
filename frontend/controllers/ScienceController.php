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

use common\models\AR\Essence;
use Yii;
use common\models\AR\Science;
use frontend\components\FrontendController;

class ScienceController extends FrontendController
{

    public function actionIndex($science)
    {
        $model = Science::findOne(['title' => $science, 'lang_code' => Yii::$app->language]);
        return $this->render("index",['science' => $model]);
    }

    public function actionCommon()
    {
        $models = Science::findAll(['lang_code' => Yii::$app->language]);
        return $this->render("common",['sciences' => $models]);
    }

}