<?php
/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\FrontendAsset;
use frontend\components\NgModuleAssetBundle;
use yii\helpers\Html;
FrontendAsset::register($this);
NgModuleAssetBundle::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>" data-ng-app="app">
<head>
    <meta charset="<?=Yii::$app->charset?>"/>
    <title><?=Html::encode($this->title)?></title>
    <link rel="icon" type="image/png" href="favicon.ico">
    <meta name="description" content="<?= Yii::$app->params['projectDescription'] ?>"/>
    <meta name="author" content="<?= Yii::$app->params['projectAuthor'] ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <? $this->head(); ?>
</head>
<body ng-controller="AppCtrl">
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
