<?php
/**
 * Date: 21.06.15
 * Time: 3:54
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\models\AR\user;

use api\models\AR\RestUser;

class SearchUser extends RestUser
{
    public $shield = [
        'default' => [
            'login' => true,
            'email' => false,
            'phone' => false,
            'zone' => false,
            'area' => false,
            'street' => false,
            'build' => false,
            'flat' => false,
            'auth_key' => false,
            'password_hash' => false,
            'password_reset_token' => false,
            'status' => false,
            'access_id' => false,
        ],
    ];
}