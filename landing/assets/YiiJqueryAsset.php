<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18.08.15
 * Time: 15:06
 */

namespace landing\assets;

use yii\web\AssetBundle;

class YiiJqueryAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery/dist';
    public $js = [
        'jquery.js',
    ];
}