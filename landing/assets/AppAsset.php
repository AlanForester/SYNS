<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace landing\assets;

use yii\web\AssetBundle;
use yii\web\View;
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/';
    public $baseUrl = '@web';
    public $css = [
        'assets/bootstrap/css/bootstrap.min.css',
        'assets/bootstrap/css/bootstrap-theme.min.css',
        'assets/js/owl-carousel/owl.carousel.css',
        'assets/js/owl-carousel/owl.theme.css',
        'assets/js/owl-carousel/owl.transitions.css',
        'assets/js/wow/animate.css',
        'assets/css/font-awesome/css/font-awesome.min.css',
        'assets/js/lightbox/css/lightbox.css',
        'assets/css/styles.css',
        'assets/css/custom.css',

    ];
    public $js = [
        'assets/js/jquery-1.11.1.min.js',
        'assets/bootstrap/js/bootstrap.min.js',
        'assets/js/jquery.easing.1.3.js',
        'assets/js/jquery.backstretch.min.js',
        'assets/js/detectmobilebrowser.js',
        'assets/js/owl-carousel/owl.carousel.min.js',
        'assets/js/lightbox/js/lightbox.min.js',
        'assets/js/wow/wow.min.js',
        'assets/js/jquery.fitvids.js',
        'assets/js/functions.js',
        'assets/js/initialise-functions.js'
    ];
//    public $depends = [
//
//    ];

    public function init() {
        $this->jsOptions['position'] = View::POS_HEAD;
        parent::init();
    }
}
