<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.08.15
 * Time: 11:58
 */

namespace controllers;


use yii\web\Controller;

class LandingController extends Controller
{
    public function actionIndex() {
        return $this->render('index');
    }
}