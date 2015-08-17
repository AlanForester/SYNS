<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

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
    <!-- favicon -->
    <link rel="icon" type="image/png" href="favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- owl carousel css -->
    <link href="assets/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/js/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="assets/js/owl-carousel/owl.transitions.css" rel="stylesheet">
    <!-- intro animations -->
    <link href="assets/js/wow/animate.css" rel="stylesheet">
    <!-- font awesome -->
    <link href="assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- lightbox -->
    <link href="assets/js/lightbox/css/lightbox.css" rel="stylesheet">

    <!-- styles for this template -->
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- place your extra custom styles in this file -->
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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
