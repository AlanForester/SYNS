<?php
/**
 * Date: 01.07.15
 * Time: 1:33
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\assets\index;

use yii\web\AssetBundle;
use yii\web\View;

class IndexAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@webroot/app/index';

    public $css = [
        'styles/bootstrap.min.css',
        'styles/landing.css',
        'styles/animate.min.css',
        'styles/font-awesome.min.css',
        'styles/open-sans.css',
        'styles/merriweather.css',
        'styles/ts-fonts.css'
    ];

    public $js = [
        //'controllers/indexMainCtrl.coffee',
        'scripts/jquery.js',
        'scripts/bootstrap.min.js',
        'scripts/html5shiv.js',
        'scripts/respond.min.js',
        'scripts/jquery.easing.min.js',
        'scripts/jquery.fittext.js',
        'scripts/wow.min.js',
        'scripts/landing.js'
    ];


}