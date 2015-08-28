<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\records\Pattern]].
 *
 * @see \common\models\records\Pattern
 */
class PatternQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\records\Pattern[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\records\Pattern|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}