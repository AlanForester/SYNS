<?php
/**
 * Date: 17.08.15
 * Time: 22:31
 * Project: TimeShift.in
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */
use kartik\icons\Icon;
use yii\helpers\Url;
?>

<section id="left-sidebar">

    <div class="logo">
        <a href="#intro" ><img src="TimeShift.png" alt="TimeShift"></a>
    </div>

    <div id="mobile-menu-icon" class="visible-xs" onClick="toggle_main_menu();"><span
            class="glyphicon glyphicon-th"></span></div>

    <ul id="main-menu">
        <li id="menu-item-text" class="menu-item scroll"><span style="position: absolute"><?=Icon::show("users",['class' => 'fa-1x'],Icon::FA)?></span><a href="#text">Проект</a></li>
<!--        <li id="menu-item-carousel" class="menu-item scroll"><span style="position: absolute">--><?//=Icon::show("magic",['class' => 'fa-1x'],Icon::FA)?><!--</span><a href="#carousel">Создавай</a></li>-->
        <li id="menu-item-grid" class="menu-item scroll"><span style="position: absolute"><?=Icon::show("plus",['class' => 'fa-1x'],Icon::FA)?></span><a href="#grid">Используй</a></li>
<!--        <li id="menu-item-featured" class="menu-item scroll"><span style="position: absolute">--><?//=Icon::show("plug",['class' => 'fa-1x'],Icon::FA)?><!--</span><a href="#featured">Помогай</a></li>-->
        <li id="menu-item-contact" class="menu-item scroll"><span style="position: absolute"><?=Icon::show("share-alt",['class' => 'fa-1x'],Icon::FA)?></span><a href="#contact">Предлагай</a></li>
    </ul>
    <br>
    <div class="alert alert-message text-center">
        <a href="<?=Url::toRoute(['go-to-project'])?>">Войти в <?=Yii::$app->name?></a>
    </div>

</section>
