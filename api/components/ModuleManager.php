<?php
/**
 * File: ModuleManager.php
 * Date: 04.08.15
 * Project: TimeShift.in
 * Developer Alex Collin <alex@collin.su>
 * Copyright by "CleverTek LLC" 2014-2015
 */


namespace api\components;

use Yii;
use GlobIterator;
use yii\web\HttpException;

/**
 * Class ModuleManager
 * @package api\components
 */
class ModuleManager
{

    /**
     * @var bool|string
     */
    private $basePath = 'api';


    /**
     * @return array
     * @throws HttpException
     */
    public static function getModules()
    {
        $obj = new self;
        $modules = $obj->getModulesNameFromModulesDir();
        $config = $obj->getConfig($modules);
        return $config;
    }

    /**
     * @return array
     * @throws HttpException
     */
    private function getModulesNameFromModulesDir()
    {
        $modules = [];
        foreach (new GlobIterator(dirname(__DIR__) . '/modules/*') as $item) {
            $module = $item->getBasename();
            if ($item->isDir()) {
                if (file_exists($item . "/" . $module . ".php")) {
                    $modules[] = $module;
                } else {
                    throw new HttpException(502,"Module file " . $module . " dont exist!");
                }
            }
        }
        return $modules;
    }

    /**
     * @param $modules
     * @return array
     */
    private function getConfig($modules)
    {
        $config = [];
        foreach ($modules as $module) {
            $config[$module] = [
                'basePath' => '@' . $this->basePath . '/modules/' . $module,
                'class' => $this->basePath . '\modules\\' . $module . '\\' . ucfirst($module),
                'controllerNamespace' => $this->basePath . '\modules' . '\\' . $module . '\controllers',
                'components' => [
                    'request' => [
                        'class' => '\yii\web\Request',
                        'parsers' => [
                            'application/json' => 'yii\web\JsonParser',
                            'throwException' => TRUE,
                        ],
                    ],
                ]
            ];
        }
        return $config;
    }
}