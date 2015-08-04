<?php
/**
 * Date: 06.05.15
 * Time: 21:50
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace common\helpers;

use Yii;
use common\models\UserIdentity;

class UserHelper
{

    /**
     * @param $email
     * @param $password
     * @return UserIdentity
     */
    public static function createUser($email, $password)
    {
        $user = new UserIdentity();
        $user->email = $email;
        $user->login = md5($email);
        $user->access_id = 110;
        $user->status = true;
        $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
        $user->auth_key = Yii::$app->getSecurity()->generateRandomString();
        if ($user->validate())
            $user->save();
        return $user;
    }

}