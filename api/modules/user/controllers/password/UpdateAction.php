<?php
/**
 * Date: 21.06.15
 * Time: 20:06
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\api\core\user\controllers\password;

use app\api\core\user\models\common\RestUser;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\ServerErrorHttpException;
class UpdateAction extends \app\api\common\actions\UpdateAction {

    public function run($token,$login) {
        $user = RestUser::findOne($login);
        if(!$user)
            throw new ServerErrorHttpException("Invalid request");
        $body = Yii::$app->getRequest()->getBodyParams();
        $password = $body['password'];
        if(!empty($password)) {
            $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
        } else {
            throw new BadRequestHttpException("Password must be set");
        }

        if(empty($token)) {
            throw new BadRequestHttpException("Token must be set");
        }
        if($token == $user->password_reset_token) {
            $user->password_reset_token = "";
            $user->save();
        } else {
            throw new BadRequestHttpException("Invalid token");
        }

        return $user->getErrors();
    }
}