<?php
/**
 * Date: 19.06.15
 * Time: 17:16
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\models\records\user;

use api\models\records\RestUser;

class ProfileUser extends RestUser {

    public $shield = [
        'default' => [
            '!auth_key' => false,
            '!password_hash' => false,
            '!password_reset_token' => false,
            '!status' => false,
            '!access_id' => false,
            '!rating' => true,
            '!created_at' => true,
            '!updated_at' => true,
        ],
    ];

}