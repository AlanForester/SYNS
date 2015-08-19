<?php
/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\FrontendAsset;
FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>" data-ng-app="app">
<head>
    <meta charset="<?=Yii::$app->charset?>"/>
    <title>Be Angular | Bootstrap Admin Web App with AngularJS</title>
    <meta name="description" content="<?= Yii::$app->params['projectDescription'] ?>"/>
    <meta name="author" content="<?= Yii::$app->params['projectAuthor'] ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/simple-line-icons.css" type="text/css"/>
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link rel="stylesheet" href="css/app.css" type="text/css"/>
</head>
<body ng-controller="AppCtrl">
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
