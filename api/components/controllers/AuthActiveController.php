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
use app\models\UserIdentity as User;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
class AuthActiveController extends Controller
{

    public $modelClass = 'app\models\UserIdentity';

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
                ]
            ],
        ];
        return $behaviors;
    }

} 