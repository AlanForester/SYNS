<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.08.15
 * Time: 14:58
 */

namespace frontend\components;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class NgModuleAssetBundle extends AssetBundle
{

    public $css = [];

    public $js = [];

    public $depends = [
        'frontend\assets\common\CoreAsset',
        'frontend\assets\common\NgAsset'
    ];

    public function init()
    {
        $this->sourcePath = dirname(__DIR__) . '/views/' . Yii::$app->controller->id . "/app/";
        $this->jsOptions['position'] = View::POS_END;
        $this->mergeWithJSON();
        parent::init();
    }

    protected function mergeWithJSON()
    {
        $json = $this->sourcePath. 'assets.json';
        if (file_exists($json)) {
            $jsonConfig = file_get_contents($json);
            $config = json_decode($jsonConfig, true);
            if (isset($config['js']))
                $this->js = $config['js'];
            if (isset($config['js']))
                $this->css = $config['css'];
        }
    }
}