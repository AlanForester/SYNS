<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.08.15
 * Time: 14:15
 */
use frontend\assets\DefaultAsset;
use lajax\translatemanager\helpers\Language as Lx;
DefaultAsset::register($this);
echo Lx::t('category', 'Appled');
?>
<div class="app" id="app" ng-class="{'app-header-fixed':app.settings.headerFixed, 'app-aside-fixed':app.settings.asideFixed, 'app-aside-folded':app.settings.asideFolded, 'app-aside-dock':app.settings.asideDock, 'container':app.settings.container}" ui-view></div>
