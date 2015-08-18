<?php
use yii\helpers\Html;
use landing\assets\AppAsset;
/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
?>
<? $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name) ?></title>
    <? $this->head() ?>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="favicon.ico">
    <meta name="description" content="<?= Yii::$app->params['projectDescription'] ?>">
    <meta name="author" content="<?= Yii::$app->params['projectAuthor'] ?>">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<? $this->beginBody() ?>
<?= $content ?>
<? $this->endBody() ?>
</body>
</html>
<? $this->endPage() ?>
