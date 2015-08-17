<?php
/**
 * Date: 17.08.15
 * Time: 22:42
 * Project: TimeShift.in
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */
?>

<article id="contact" class="section-wrapper clearfix"
         data-custom-background-img="assets/images/other_images/bg4.jpg">
    <div class="content-wrapper clearfix">

        <h1 class="section-title">Contact</h1>

        <!-- CONTACT DETAILS -->
        <div class="contact-details col-sm-5 col-md-3">
            <p>123A,<br/>Molestie Lorem Avenue,<br/>Aliquam<br/>AAA0010</p>

            <p>Tel: (+20) 21 301 524</p>

            <p><a href="mailto:info@loremipsum.com">info@loremipsum.com</a></p>
        </div>
        <!-- END: CONTACT DETAILS -->

        <!-- CONTACT FORM -->
        <div class="col-sm-7 col-md-9">
            <!-- IMPORTANT: change the email address at the top of the assets/php/mail.php file to the email address that you want this form to send to -->

            <form class="form-style validate-form clearfix" action="assets/php/mail.php" method="POST"
                  role="form">

                <!-- form left col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="text-field form-control validate-field required"
                               data-validation-type="string" placeholder="Full Name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="text-field form-control validate-field required"
                               data-validation-type="email" id="form-email" placeholder="Email Address"
                               name="email">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="text-field form-control validate-field phone"
                               data-validation-type="phone" id="form-contact-number"
                               placeholder="Contact Number" name="contact_number">
                    </div>
                    <div class="form-group text-right">
                        <img id="form-captcha-img" src="">
                        <input type="text" class="text-field form-control validate-field required"
                               data-validation-type="captcha" id="form-captcha" placeholder="Enter text"
                               name="captcha">
                        <span id="form-captcha-refresh" class="fa fa-refresh" title="Reload"></span>
                    </div>
                </div>
                <!-- end: form left col -->

                <!-- form right col -->
                <div class="col-md-6">
                    <div class="form-group">
                                <textarea placeholder="Message..." class="form-control validate-field required"
                                          name="message"></textarea>
                    </div>
                    <div class="form-group">
                        <img src="assets/images/theme_images/loader-form.GIF" class="form-loader">
                        <button type="submit" class="btn btn-sm btn-outline-inverse">Submit</button>
                    </div>
                    <div class="form-group form-general-error-container"></div>
                </div>
                <!-- end: form right col -->

            </form>
            <?php /*$form = ActiveForm::begin([
                        'id' => 'contact-form',
                        'action' => Url::toRoute('contacts'),
                        'options' => [
                            'class' => 'form-style validate-form clearfix',
                            'role' => 'form',
                        ]
                    ]); */?><!--
                    <div class="col-md-6">
                        <div class="form-group">
                            <?/*= $form->field($model, 'name', [
                            ]) */?>
                        </div>
                        <div class="form-group">
                            <?/*= $form->field($model, 'email') */?>
                        </div>
                        <div class="form-group">
                            <?/*= $form->field($model, 'subject') */?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?/*= $form->field($model, 'body')->textArea(['rows' => 6]) */?>
                        </div>
                        <div class="form-group">
                            <?/*= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'captchaAction' => 'default/captcha',
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ]) */?>
                            <?/*= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) */?>
                        </div>
                    </div>
                    --><?php /*ActiveForm::end(); */?>
        </div>
        <!-- end: CONTACT FORM -->

    </div>
    <!-- .content-wrapper -->
</article>
