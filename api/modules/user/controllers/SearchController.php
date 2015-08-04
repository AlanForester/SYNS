<?php
/**
 * Date: 08.05.15
 * Time: 11:02
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\modules\user\controllers;


use api\components\controllers\AuthActiveController;

class SearchController extends AuthActiveController
{

    public $modelClass = 'api\models\AR\user\SearchUser';

}