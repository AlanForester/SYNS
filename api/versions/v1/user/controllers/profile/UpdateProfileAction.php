<?php
/**
 * Date: 05.05.15
 * Time: 14:26
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\versions\v1\user\controllers\profile;

use Yii;
use yii\web\ServerErrorHttpException;
use common\components\ActiveRecord;
use api\components\actions\UpdateAction as BaseUpdateAction;

class UpdateProfileAction extends BaseUpdateAction {

    public $modelClass = 'api\models\records\user\ProfileUser';
    /**
     * Updates an existing model.
     * @return \yii\db\ActiveRecordInterface the model being updated
     * @throws ServerErrorHttpException if there is any error when updating the model
     */

    public function run($id = null)
    {
        /* @var $model ActiveRecord */
        $model = $this->findModel(Yii::$app->user->id);
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }

        $model->scenario = $this->scenario;
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }

        return $model;
    }
}
