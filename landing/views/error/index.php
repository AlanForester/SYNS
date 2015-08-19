<?
/*
 * Date: 22.04.15
 * Project: TimeShift
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use yii\helpers\Html;
$this->title = $name;
?>

<div class="site-error">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-message">
        <?= Html::encode($message) ?>
    </div>
</div>
