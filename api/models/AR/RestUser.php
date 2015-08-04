<?php
/**
 * Date: 19.06.15
 * Time: 17:16
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\models\AR;

use common\models\AR\User;

/**
 * Class RestUser
 * @package app\api\core\user\models\common
 */
class RestUser extends User {

    public $shield = [
        'default' => [

        ],
    ];

}