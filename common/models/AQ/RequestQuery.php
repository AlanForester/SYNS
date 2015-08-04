<?php

namespace common\models\AQ;
use common\components\ActiveQuery;
/**
 * This is the ActiveQuery class for [[\common\models\AR\Request]].
 *
 * @see \common\models\AR\Request
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
     * @return \common\models\AR\Request[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\AR\Request|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}