<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\records\ComplexAssignment]].
 *
 * @see \common\models\records\ComplexAssignment
 */
class ComplexAssignmentQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\records\ComplexAssignment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\records\ComplexAssignment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}