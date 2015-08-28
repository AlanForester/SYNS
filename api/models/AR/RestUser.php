<?php
/**
 * Date: 19.06.15
 * Time: 17:16
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\models\records;

use common\models\records\User;

/**
 * Class RestUser
 * @package api\models\records
 */
class RestUser extends User {

    public $shield = [
        'default' => [

        ],
    ];

}