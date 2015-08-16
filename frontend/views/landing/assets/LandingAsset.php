<?php
/**
 * Date: 01.07.15
 * Time: 1:33
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace frontend\views\landing\assets;

use yii\web\AssetBundle;
use dee\angular\View;
class LandingAsset extends AssetBundle {

    /**
     * @inheritdoc
     */
    public $sourcePath = '@views/landing/';

    /**
     * @inheritdoc
     */
    public $js = [
        'scripts/jquery-1.11.1.min.js',
        'scripts/bootstrap.min.js',
        'scripts/jquery.easing.1.3.js',
        'scripts/jquery.backstretch.min.js',
        'scripts/detectmobilebrowser.js',
        'scripts/owl.carousel.min.js',
        'scripts/lightbox.min.js',
        'scripts/wow.min.js',
        'scripts/jquery.fitvids.js',
        'scripts/functions.js',
        'scripts/initialise-functions.js',


    ];

//    public $depends = [
//       'app\assets\AngularAsset'
//    ];

    public $css = [
        'styles/bootstrap.css',
        'styles/bootstrap-theme.css',
        'styles/owl.carousel.css',
        'styles/owl.theme.css',
        'styles/owl.transitions.css',
        'styles/animate.css',
        'styles/font-awesome.css',
        'styles/lightbox.css',
        'styles/styles.css',
        'styles/custom.css'
    ];

    public $jsOptions = [
        'position' => View::POS_END
    ];

    

}