<?php
/**
 * Date: 17.08.15
 * Time: 22:40
 * Project: TimeShift.in
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */
use kartik\icons\Icon;
?>

<article id="text" class="section-wrapper clearfix"
         data-custom-background-img="assets/images/other_images/bg1.jpg">
    <div class="content-wrapper clearfix">
        <div class="col-sm-10 col-md-9 pull-right">

            <h1 class="section-title">Наглядность информации</h1>

            <p class="feature-paragraph">
                <span class="lazy pull-right">
                    <?=Icon::show("leaf",['class' => 'fa-4x', 'style' => 'margin-left:10px;'],Icon::FA)?>
                </span>
                Наша цель, предоставить возможность,
                зрительно показать о состоянии и возможности многих вещей, а так-же их связей с другими родственниками.
                Это может быть область медицы или психологии. В этом нам помогают фундаментальные основы физики и философии.
                Но развитие остается за вами!</p>
            <h4>Ваш Вклад в будущее</h4>

            <p>Ваши знания могут пригодиться кому угодно. Мало того, мы постараемся использовать ваш вклад максимально эффективно, для совершенствования Вашей области развития с помощью самообучаемых роботов.</p>

            <p><a href="" onclick="populate_and_open_modal(event, 'modal-content-1');"
                  class="btn btn-outline-inverse btn-sm">Войти в проект</a></p>

            <div class="content-to-populate-in-modal" id="modal-content-1">
                <h1>Lorem Ipsum</h1>

                <p><img data-img-src="assets/images/other_images/transp-image4.png"
                        class="lazy rounded_border hover_effect pull-right" alt="Lorem Ipsum">Lorem ipsum dolor
                    sit amet, consectetur adipiscing elit. Sed in urna vel ante mollis tincidunt. Donec nec
                    magna condimentum tortor laoreet lobortis. Nunc accumsan sapien eu tortor fringilla, et
                    condimentum metus pellentesque. Maecenas rhoncus tortor nec mi congue aliquet. Integer eu
                    turpis scelerisque, iaculis magna non, tempor sem. Quisque consectetur nisi eu felis
                    euismod, sit amet faucibus justo molestie. Ut pretium sapien dui, id facilisis metus
                    interdum pharetra.</p>

                <p>Etiam scelerisque lacus tempor, rhoncus diam vel, gravida felis. Fusce tristique sem et leo
                    aliquam vulputate. Ut eget orci in sapien commodo fringilla. Ut luctus faucibus viverra.
                    Quisque ut ante eget libero rutrum imperdiet. Morbi in diam bibendum, venenatis arcu sed,
                    consequat libero. Nulla imperdiet, ipsum et adipiscing pulvinar, nibh metus porta mauris, et
                    vestibulum dolor sapien sit amet justo. In dignissim leo nec erat faucibus volutpat.</p>

                <h3>Duis dictum lorem metus, vitae dapibus</h3>

                <p><img data-img-src="assets/images/other_images/transp-image3.png"
                        class="lazy rounded_border hover_effect pull-left" alt="Lorem Ipsum">Sed auctor urna mi,
                    sed fringilla felis vulputate nec. Cras eu nibh id quam pretium convallis. Donec ante enim,
                    placerat nec sagittis sit amet, tempor in velit. Maecenas ultricies commodo lacus id porta.
                    Suspendisse eros elit, lacinia vitae erat vitae, egestas accumsan nunc. Maecenas dictum odio
                    ipsum, non volutpat erat consequat tempor. Pellentesque sed malesuada turpis. Quisque eget
                    lacus sit amet dui feugiat molestie sit amet eget purus. Morbi eget neque nec lectus tempus
                    sagittis nec at ante. </p>

                <p>Etiam scelerisque lacus tempor, rhoncus diam vel, gravida felis. Fusce tristique sem et leo
                    aliquam vulputate. Ut eget orci in sapien commodo fringilla. Ut luctus faucibus viverra.
                    Quisque ut ante eget libero rutrum imperdiet. Morbi in diam bibendum, venenatis arcu sed,
                    consequat libero. Nulla imperdiet, ipsum et adipiscing pulvinar, nibh metus porta mauris, et
                    vestibulum dolor sapien sit amet justo. In dignissim leo nec erat faucibus volutpat.</p>
            </div>
            <!-- #modal-content-1 -->

        </div>
        <!-- .col-sm-10 -->
    </div>
    <!-- .content-wrapper -->
</article>
