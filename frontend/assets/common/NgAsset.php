<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.08.15
 * Time: 14:41
 */

namespace frontend\assets\common;

use yii\web\View;
use yii\web\AssetBundle;

class NgAsset extends AssetBundle
{
    public $sourcePath = '@webroot';

    public $js = [
        'vendor/angular/angular.js',
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
    ];

    public function init()
    {
        $this->jsOptions['position'] = View::POS_END;
        parent::init();
    }
}