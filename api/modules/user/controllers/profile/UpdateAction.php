<?php
/**
 * Date: 05.05.15
 * Time: 14:26
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\api\core\user\controllers\profile;

use Yii;
use yii\web\ServerErrorHttpException;
use app\api\common\models\RestActiveRecord;
use app\api\common\actions\UpdateAction as BaseUpdateAction;

class UpdateAction extends BaseUpdateAction {

    public $modelClass = 'app\api\core\user\models\ProfileUser';
    /**
     * Updates an existing model.
     * @return \yii\db\ActiveRecordInterface the model being updated
     * @throws ServerErrorHttpException if there is any error when updating the model
     */
    public function run()
    {
        /* @var $model RestActiveRecord */
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
