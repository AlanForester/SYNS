<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\records\AccessRule]].
 *
 * @see \common\models\records\AccessRule
 */
class AccessRuleQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\records\AccessRule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\records\AccessRule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}