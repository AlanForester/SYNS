<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\records\Tract]].
 *
 * @see \common\models\records\Tract
 */
class TractQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\records\Tract[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\records\Tract|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}