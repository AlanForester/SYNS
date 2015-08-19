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
use landing\models\ContactForm;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class DefaultController extends LandingController
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'landing\components\CaptchaAction',
            ],
        ];
    }

    public function actionIndex() {
        $requests = Request::find()->onLanding()->all();
        $contacts = new ContactForm();
        return $this->render('index.php',[
            'requests' => $requests,
            'model' => $contacts,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //return $this->refresh();
            $model->sendEmail();
            return Json::encode($model->attributes);
        } else {
            return Json::encode($model->getErrors());
        }
    }

    public function actionGoToProject() {
        return $this->redirect(Url::to("http://".Yii::$app->params['frontendSite']));
    }

}
