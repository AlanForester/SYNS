<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.08.15
 * Time: 13:23
 */

use yii\helpers\Url;
use yii\helpers\Html;
use landing\widgets\ActiveForm;
use landing\widgets\Captcha;
use yii\web\View;
?>
    <div class="background-image-overlay"></div>
    <div id="outer-background-container" data-default-background-img="assets/images/other_images/bg5.jpg"
         style="background-image:url(assets/images/other_images/bg5.jpg);"></div>
    <div id="outer-container">
        <?= $this->render("index/leftBar"); ?>
        <section id="main-content" class="clearfix">

            <?= $this->render("index/intro"); ?>

            <?= $this->render("index/text"); ?>

            <?//= $this->render("index/carousel"); ?>

            <?= $this->render("index/grid"); ?>

            <?//= $this->render("index/featured"); ?>

            <?= $this->render("index/contact",['model' => $model]); ?>

        </section>
        <?= $this->render("index/footer"); ?>
    </div>

<?= $this->render("index/modal"); ?>

<?= "<!--[if lt IE 9]>" ?>
<? $this->registerJs('jQuery("#outer-background-container").backstretch("assets/images/other_images/bg5.jpg");', View::POS_READY); ?>
<?= "<![endif]-->" ?>

