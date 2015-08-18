<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18.08.15
 * Time: 15:02
 */

namespace landing\assets;


use yii\web\AssetBundle;

class YiiAsset extends AssetBundle
{
    public $sourcePath = '@yii/assets';
    public $js = [
        'yii.js',
    ];

    public $depends = [
        'landing\assets\YiiJqueryAsset',
    ];
}