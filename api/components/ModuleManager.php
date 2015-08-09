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
use yii\helpers\ArrayHelper;

class ModuleManager
{

    private $basePath = 'api';


    public static function getConfig()
    {
        $manager = new self;
        $versions = $manager->getVersions();
        $versionModules = $manager->getVersionModules($versions);
        $modules = $manager->getModulesConfig($versionModules);
        $rules = $manager->getModuleRules($modules);
        $config = $manager->buildConfig($modules, $rules);
        return $config;
    }

    private function getVersions()
    {
        $versions = [];
        foreach (new GlobIterator(dirname(__DIR__) . '/versions/*') as $item) {
            $version = $item->getBasename();
            if ($item->isDir()) {
                $versions[] = $version;
            } else {
                throw new HttpException(502, "In the modules directory don't must be files. " . $version . " in the module dir!");
            }
        }
        return $versions;
    }

    private function getVersionModules($versions)
    {
        $modules = [];
        foreach ($versions as $version)
            foreach (new GlobIterator(dirname(__DIR__) . '/versions/' . $version . '/*') as $item) {
                $module = $item->getBasename();
                if ($item->isDir()) {
                    if (file_exists($item . "/" . $module . ".php")) {
                        $modules[$version]['modules'][] = $module;
                    } else {
                        throw new HttpException(502, "Module file " . $module . " don't exist!");
                    }
                }
            }
        return $modules;
    }

    private function getModulesConfig($versionModules)
    {
        $config = [];
        foreach ($versionModules as $version => $modules) {
            foreach ($modules['modules'] as $module) {
                $config[$version][$module] = [
                    'basePath' => '@' . $this->basePath . '/versions/' . $version . '/' . $module,
                    'class' => $this->basePath . '\versions\\' . $version . '\\' . $module . '\\' . ucfirst($module),
                    'controllerNamespace' => $this->basePath . '\versions\\' . $version . '\\' . $module . '\controllers',
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
        }
        return $config;
    }

    private function getModuleRules($moduleConfig)
    {
        $rules = [];
        foreach ($moduleConfig as $version => $modules)
            foreach ($modules as $moduleName => $module) {
                $ruleFile = dirname(__DIR__) . '/versions/' . $version . '/' . $moduleName . '/config/urlRules.php';
                if (file_exists($ruleFile)) {
                    $ruleModule = require($ruleFile);
                    foreach ($ruleModule as $index => $rule) {
                        $ruleModule[$index]['prefix'] = $version;
                    }
                    $rules = ArrayHelper::merge($ruleModule, $rules);
                } else {
                    throw new HttpException(502, "Module " . $moduleName . " must have rule file - urlRules.php!");
                }
            }
        return $rules;
    }

    private function buildConfig($modules, $rules)
    {
        $config['modules'] = [];
        foreach ($modules as $version => $module) {
            $config['modules'] = ArrayHelper::merge($config['modules'],$module);
        }
        $config['components']['urlManager']['rules'] = $rules;
        return $config;
    }

}