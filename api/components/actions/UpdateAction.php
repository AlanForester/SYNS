<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace api\components\actions;

use Yii;
use yii\rest\UpdateAction as BaseUpdateAction;
use yii\base\Model;

/**
 * UpdateAction implements the API endpoint for updating a model.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UpdateAction extends BaseUpdateAction
{
    public $scenario = Model::SCENARIO_DEFAULT;

}
