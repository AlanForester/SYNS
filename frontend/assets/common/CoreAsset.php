<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.08.15
 * Time: 14:33
 */

namespace frontend\assets\common;

use yii\web\View;
use yii\web\AssetBundle;

class CoreAsset extends AssetBundle
{
    public $sourcePath = '@webroot';

    public $css = [
        'css/bootstrap.css',
        'css/animate.css',
        'css/font-awesome.min.css',
        'css/simple-line-icons.css',
        'css/font.css',
        'css/app.css'
    ];

    public $js = [
        'vendor/jquery/jquery.min.js',
    ];

    public function init()
    {
        $this->jsOptions['position'] = View::POS_END;
        parent::init();
    }
}