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
    <!-- end: #outer-background-container -->

    <!-- Outer Container -->
    <div id="outer-container">

        <!-- Left Sidebar -->
        <?= $this->render("index/leftBar"); ?>
        <!-- #left-sidebar -->
        <!-- end: Left Sidebar -->

        <section id="main-content" class="clearfix">

            <?= $this->render("index/intro"); ?>
            <!-- .section-wrapper -->

            <?= $this->render("index/text"); ?>
            <!-- .section-wrapper -->

<!--            --><?//= $this->render("index/carousel"); ?>
            <!-- .section-wrapper -->

            <?= $this->render("index/grid"); ?>
            <!-- .section-wrapper -->

<!--            --><?//= $this->render("index/featured"); ?>
            <!-- .section-wrapper -->

            <?= $this->render("index/contact",['model' => $model]); ?>
            <!-- .section-wrapper -->

        </section>
        <!-- #main-content -->

        <!-- Footer -->
        <?= $this->render("index/footer"); ?>
        <!-- end: Footer -->

    </div><!-- #outer-container -->
    <!-- end: Outer Container -->

    <!-- Modal -->
<?= $this->render("index/modal"); ?>



<?= "<!--[if lt IE 9]>" ?>
<? $this->registerJs('jQuery("#outer-background-container").backstretch("assets/images/other_images/bg5.jpg");', View::POS_READY); ?>
<?= "<![endif]-->" ?>

