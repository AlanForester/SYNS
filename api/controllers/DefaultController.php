<?php
namespace api\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class DefaultController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}