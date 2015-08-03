<?php
/**
 * Date: 19.06.15
 * Time: 15:35
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\models\AQ;

/**
 * This is the ActiveQuery class for [[\app\models\AR\User]].
 *
 * @see \app\models\AR\User
 */

use app\components\ActiveQuery as BaseActiveQuery;

class UserQuery extends BaseActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\AR\User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\AR\User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}