<?php
/**
 * Date: 21.06.15
 * Time: 21:36
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\models\records;


use common\models\records\Mark;

class RestEssence extends Mark {

    public $shield = [
        'default' => [
            '!id' => false
        ]
    ];
}