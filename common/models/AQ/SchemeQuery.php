<?php
/**
 * Date: 19.06.15
 * Time: 15:35
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace common\models\AQ;

/**
 * This is the ActiveQuery class for [[\common\models\AR\Scheme]].
 *
 * @see \common\models\AR\Scheme
 */

use common\components\ActiveQuery as BaseActiveQuery;

class SchemeQuery extends BaseActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\AR\Scheme[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\AR\Scheme|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}