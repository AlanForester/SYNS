<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/bootstrap.css',
        'css/animate.css',
        'css/font-awesome.min.css',
        'css/simple-line-icons.css',
        'css/font.css',
        'css/app.css'
    ];

    public $js = [
        '/vendor/jquery/jquery.min.js',
        '/vendor/angular/angular.js',
        'vendor/angular/angular-animate/angular-animate.js',
        'vendor/angular/angular-cookies/angular-cookies.js',
        'vendor/angular/angular-resource/angular-resource.js',
        'vendor/angular/angular-sanitize/angular-sanitize.js',
        'vendor/angular/angular-touch/angular-touch.js',
        'vendor/angular/angular-ui-router/angular-ui-router.js',
        'vendor/angular/ngstorage/ngStorage.js',
        'vendor/angular/angular-bootstrap/ui-bootstrap-tpls.js',
        'vendor/angular/oclazyload/ocLazyLoad.js',
        'vendor/angular/angular-translate/angular-translate.js',
        'vendor/angular/angular-translate/loader-static-files.js',
        'vendor/angular/angular-translate/storage-cookie.js',
        'vendor/angular/angular-translate/storage-local.js',
        'js/app.js',
        'js/config.js',
        'js/config.lazyload.js',
        'js/config.router.js',
        'js/main.js',
        'js/services/ui-load.js',
        'js/filters/fromNow.js',
        'js/directives/setnganimate.js',
        'js/directives/ui-butterbar.js',
        'js/directives/ui-focus.js',
        'js/directives/ui-fullscreen.js',
        'js/directives/ui-jq.js',
        'js/directives/ui-module.js',
        'js/directives/ui-nav.js',
        'js/directives/ui-scroll.js',
        'js/directives/ui-shift.js',
        'js/directives/ui-toggleclass.js',
        'js/directives/ui-validate.js',
        'js/controllers/bootstrap.js'
    ];

    public function init()
    {
        $this->jsOptions['position'] = View::POS_END;
        parent::init();
    }
}
