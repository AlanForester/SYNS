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
class DefaultAsset extends AssetBundle
{
    public $sourcePath = '@webroot';

    public $js = [
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

    public $depends = [
        'frontend\assets\common\CoreAsset',
        'frontend\assets\common\NgAsset'
    ];

    public function init()
    {
        $this->jsOptions['position'] = View::POS_END;
        parent::init();
    }
}
