<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\records\User]].
 *
 * @see \common\models\records\User
 */
class UserQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\records\User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\records\User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}