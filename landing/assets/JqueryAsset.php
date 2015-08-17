<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.08.15
 * Time: 17:05
 */

namespace landing\assets;


use yii\web\AssetBundle;

class JqueryAsset extends AssetBundle
{
    public $basePath = '@vendor/bower/jquery1-dist/';
    public $baseUrl = '@web';
    public $js = [
        'jquery.min.js'
    ];
}