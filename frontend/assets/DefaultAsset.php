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
    public $sourcePath = '@app/views/layouts/app';

    public $js = [
        'app.js',
        'main.js',
        'services/ui-load.js',
        'directives/ui-jq.js',
        'directives/ui-validate.js',
        'directives/ui-nav.js',
        'directives/ui-fullscreen.js',
        'directives/ui-toggleclass.js',
        'directives/ui-module.js',
        'directives/ui-shift.js',
        'controllers/typeahead.js',

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
