<?php
/**
 * Date: 01.07.15
 * Time: 1:33
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace app\assets;

use yii\web\AssetBundle;
use dee\angular\View;
class FrontendAsset extends AssetBundle {

    /**
     * @inheritdoc
     */
    public $sourcePath = '@webroot/app/';

    /**
     * @inheritdoc
     */
    public $js = [
        'app.coffee',
    ];

    public $depends = [
       'app\assets\AngularAsset'
    ];

    public $jsOptions = [
        'position' => View::POS_END
    ];

}