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
//use yii\filters\Cors;
use yii\db\Query;

class ActiveController extends \yii\rest\ActiveController
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
//        $behaviors['corsFilter'] = [
//            'class' => Cors::className(),
//            'Access-Control-Request-Method' => ['POST', 'PUT'],
//            'Access-Control-Allow-Origin' => ['*'],
//            'Origin' => ['*'],
//           // 'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
//            'Access-Control-Request-Headers' => ['*'],
//            'Access-Control-Allow-Credentials' => true,
//            'Access-Control-Max-Age' => 86400,
//        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['view']['class'] = 'api\components\actions\ViewAction';
        $actions['view']['modelClass'] = $this->modelClass;
        $actions['index']['class'] = 'api\components\actions\IndexAction';
        $actions['index']['modelClass'] = $this->modelClass;
        $actions['update']['class'] = 'api\components\actions\UpdateAction';
        $actions['update']['modelClass'] = $this->modelClass;
        $actions['delete']['class'] = 'api\components\actions\DeleteAction';
        $actions['delete']['modelClass'] = $this->modelClass;
        $actions['create']['class'] = 'api\components\actions\CreateAction';
        $actions['create']['modelClass'] = $this->modelClass;
        $actions['options']['collectionOptions'] = ['GET', 'POST', 'HEAD', 'OPTIONS', 'DELETE', 'PUT', 'PATCH'];
        return $actions;
    }

    /**
     * @inheritdoc
     */
    protected function verbs()
    {
        return [
            'index' => ['GET'],
            'view' => ['GET'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
            'search' => ['HEAD']
        ];
    }

}