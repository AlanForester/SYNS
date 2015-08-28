<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\records\Request]].
 *
 * @see \common\models\records\Request
 */
class RequestQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\records\Request[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\records\Request|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}