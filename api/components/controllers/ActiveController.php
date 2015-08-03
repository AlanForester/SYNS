<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\components\controllers;

use yii\filters\HttpCache;
use yii\filters\Cors;
use yii\db\Query;

class ActiveController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['httpCache'] = [
            'class' => HttpCache::className(),
            'only' => ['list'],
            'lastModified' => function ($action, $params) {
                $q = new Query();
                return strtotime($q->from('user')->max('updated_at'));
            },
        ];
        //ВАЖНО!!! надо добавлять для кросс-доменных запрсосов
        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'Access-Control-Request-Method' => ['POST', 'PUT'],
            'Access-Control-Allow-Origin' => ['*'],
            'Origin' => ['*'],
            'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
            'Access-Control-Request-Headers' => ['*'],
            'Access-Control-Allow-Credentials' => true,
            'Access-Control-Max-Age' => 86400,
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['view']['class'] = 'app\api\common\actions\ViewAction';
        $actions['index']['class'] = 'app\api\common\actions\IndexAction';
        $actions['update']['class'] = 'app\api\common\actions\UpdateAction';
        $actions['delete']['class'] = 'app\api\common\actions\DeleteAction';
        $actions['create']['class'] = 'app\api\common\actions\CreateAction';
        $actions['options']['collectionOptions'] = ['GET', 'POST', 'HEAD', 'OPTIONS', 'DELETE', 'PUT', 'PATCH',];
        return $actions;
    }

    /**
     * @inheritdoc
     */
    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['search'] = ['GET', 'HEAD'];
        return $verbs;
    }
}