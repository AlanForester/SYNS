<?php
/* @var $this \yii\web\View */
/* @var $content string */

use frontend\components\NgModuleAssetBundle;
use yii\helpers\Html;
use frontend\assets\DefaultAsset;

NgModuleAssetBundle::register($this);
DefaultAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" data-ng-app="syns">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" type="image/png" href="favicon.ico">
    <meta name="description" content="<?= Yii::$app->params['projectDescription'] ?>"/>
    <meta name="author" content="<?= Yii::$app->params['projectAuthor'] ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <? $this->head(); ?>
</head>
<body ng-controller="SynsCtrl">

    <?= $this->render("header"); ?>
    <? $this->beginBody() ?>
        <?= $content ?>
    <? $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
