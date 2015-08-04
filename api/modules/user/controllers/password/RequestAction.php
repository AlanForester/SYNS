<?php
/**
 * Date: 21.06.15
 * Time: 18:14
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\api\core\user\controllers\password;

use Yii;
use app\api\core\user\models\common\RestUser;
use yii\rest\Action;
use yii\web\ServerErrorHttpException;

class RequestAction extends Action
{
    public function run($login)
    {
        $user = RestUser::findOne($login);
        if(!$user)
            throw new ServerErrorHttpException("Invalid request");
        $user->password_reset_token = Yii::$app->getSecurity()->generateRandomString();
        if ($user->save()) {
            Yii::$app->mailer->compose('reset_password',[
                'token' => $user->password_reset_token
            ])
                ->setTo($user->email)
                ->setSubject('Password recovery')
                ->send();
        }
        return $user->getErrors();
    }
}