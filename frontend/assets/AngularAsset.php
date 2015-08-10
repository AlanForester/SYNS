<?php
/**
 * File: AngularAsset.php
 * Date: 27.07.15
 * Project: TimeShift
 * Developer Alex Collin <alex@collin.su>
 * Copyright by "CleverTek LLC" 2014-2015
 */


namespace app\assets;


use yii\web\AssetBundle;
use yii\web\View;

class AngularAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/bower/';
    public $js = [
      'restangular/dist/restangular.min.js'
    ];

    public $depends = [
        'dee\angular\AngularAsset',
        'dee\angular\AngularBootstrapAsset',
        'dee\angular\AngularValidation',
        'dee\angular\AngucompleteAsset'
    ];

    public $jsOptions = [
       'position' => View::POS_HEAD
    ];
}