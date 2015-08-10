<?php
/**
 * Date: 01.07.15
 * Time: 1:33
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\assets\map;

use yii\web\AssetBundle;

class CommonAsset extends AssetBundle {

    /**
     * @inheritdoc
     */
    public $sourcePath = '@webroot/app/map/';

    /**
     * @inheritdoc
     */
    public $css = [
        'styles/common.sass',
    ];
}