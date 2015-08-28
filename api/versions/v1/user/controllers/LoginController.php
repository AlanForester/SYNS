<?php
/**
 * Date: 26.04.15
 * Time: 10:23
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\versions\v1\user\controllers;

use Yii;
use api\components\controllers\ActiveController;
use api\models\RestLoginForm;

/**
 * Class LoginController
 * @package api\modules\user\controllers
 */
class LoginController extends ActiveController {

    public $modelClass = 'common\models\UserIdentity';
    /**
     * @return RestLoginForm|array
     * @throws \yii\base\InvalidConfigException
     */
    public function actionLogin() {
        $model = new RestLoginForm();
        $load = $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if(!empty($load)) {
            if ($model->login()) {
                $userData = [
                    'id' => Yii::$app->user->identity->getId(),
                    'key' => Yii::$app->user->identity->getAuthKey(),
                ];
                return $userData;
            } else {
                return $model;
            }
        }
        else {
            $model->validate();
            $model->getErrors();
            return $model;
        }
    }
}