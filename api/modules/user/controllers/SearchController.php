<?php
/**
 * Date: 08.05.15
 * Time: 11:02
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\api\core\user\controllers;


use app\api\common\controllers\AuthActiveController;

class SearchController extends AuthActiveController
{

    public $modelClass = 'app\api\core\user\models\SearchUser';

}