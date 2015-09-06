<?php
/**
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\components\controllers;

use Yii;
use yii\filters\RateLimiter;
use yii\filters\auth\HttpBasicAuth;
use common\models\UserIdentity as User;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use \yii\filters\auth\HttpBearerAuth;

/**
 * Class AuthActiveController
 * @package api\components\controllers
 */
class AuthActiveController extends ActiveController
{

    /**
     * @var string
     */
    public $modelClass = 'common\models\UserIdentity';

    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['rateLimiter'] = [
            'class' => RateLimiter::className(),
            'enableRateLimitHeaders' => false,
        ];
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                [
                    'class' => HttpBasicAuth::className(),
                    'auth' => function ($username, $password) {
                        return User::findOne([
                            'login' => $username,
                            'auth_key' => $password,
                        ]);
                    }
                ],
                [
                    'class' => QueryParamAuth::className(),
                    'tokenParam' => 'accessToken'
                ],
                [
                    'class' => HttpBearerAuth::className(),
                ]
            ],
        ];
        return $behaviors;
    }

} 