<?php
use yii\helpers\Html;
use frontend\views\landing\assets\LandingAsset;

/* @var $this \yii\web\View */
/* @var $content string */

LandingAsset::register($this);
?>
<? $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <? $this->head() ?>
    <meta name="description" content="<?= Yii::$app->params['projectDescription'] ?>">
    <meta name="author" content="<?= Yii::$app->params['projectAuthor'] ?>">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script><![endif]-->

</head>
<body>
<? $this->beginBody() ?>
<?= $content ?>
<? $this->endBody() ?>
</body>
</html>
<? $this->endPage() ?>
