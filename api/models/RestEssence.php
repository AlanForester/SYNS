<?php
/**
 * Date: 21.06.15
 * Time: 21:36
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\api\core\essence\models\common;


use app\models\AR\Essence;

class RestEssence extends Essence {

    public $shield = [
        'default' => [
            '!id' => false
        ]
    ];
}