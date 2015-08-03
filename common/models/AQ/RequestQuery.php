<?php

namespace app\models\AQ;
use app\components\ActiveQuery;
/**
 * This is the ActiveQuery class for [[\app\models\AR\Request]].
 *
 * @see \app\models\AR\Request
 */
class RequestQuery extends ActiveQuery
{
    public function onLanding()
    {
        $this->andWhere('[[approved_at]]!=0');
        $this->andWhere('[[title]]!=NULL');
        $this->andWhere('[[image]]!=NULL');
        $this->andWhere('[[description]]!=""');
        return $this;
    }

    /**
     * @inheritdoc
     * @return \app\models\AR\Request[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\AR\Request|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}