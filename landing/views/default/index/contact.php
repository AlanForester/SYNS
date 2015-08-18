<?php
/**
 * Date: 17.08.15
 * Time: 22:42
 * Project: TimeShift.in
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

use landing\widgets\ActiveForm;
use landing\widgets\Captcha;
use yii\helpers\Html;
use yii\web\View;

?>

<article id="contact" class="section-wrapper clearfix"
         data-custom-background-img="assets/images/other_images/bg4.jpg">
    <div class="content-wrapper clearfix">

        <h1 class="section-title" id="contact-header">Контакты</h1>

        <!-- CONTACT DETAILS -->
        <div class="contact-details col-sm-5 col-md-3">
            <!--            <p>123A,<br/>Molestie Lorem Avenue,<br/>Aliquam<br/>AAA0010</p>-->

            <!--            <p>Tel: (+20) 21 301 524</p>-->

            <p><a href="mailto:info@timeshift.in">Написать письмо </a><br>Email: info@timeshift.in</a></p>

            <p><a href="skype:live:alex_300?chat">Написать сообщение </a><br>Skype: live:alex_300</p>
        </div>
        <!-- END: CONTACT DETAILS -->

        <!-- CONTACT FORM -->
        <div class="col-sm-7 col-md-9">
            <!-- IMPORTANT: change the email address at the top of the assets/php/mail.php file to the email address that you want this form to send to -->

            <?php $form = ActiveForm::begin([
                'id' => 'contact-form',
                'action' => ['contact'],
                'options' => [
                    'class' => 'form-style clearfix',
                    'role' => 'form',
                ]
            ]); ?>
            <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'name', [
                        'inputOptions' => [
                            'class' => 'text-field form-control',
                            'placeholder' => "Имя"

                        ],
                        'template' => "{input}\n{hint}\n{error}",
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'email', [
                        'inputOptions' => [
                            'class' => 'text-field form-control',
                            'placeholder' => "Email"

                        ],
                        'template' => "{input}\n{hint}\n{error}",
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'subject', [
                        'options' => [
                            'class' => 'form-group'
                        ],
                        'inputOptions' => [
                            'class' => 'text-field form-control',
                            'placeholder' => "Тема"

                        ],
                        'template' => "{input}\n{hint}\n{error}",
                    ]) ?>
                </div>
                <?= $form->field($model, 'verifyCode', [
                    'options' => [
                        'class' => 'form-group text-right',
                    ],
                    'template' => "{input}\n{hint}\n{error}",
                ])->widget(Captcha::className(), [
                    'captchaAction' => 'default/captcha',
                    'imageOptions' => [
                        'width' => '50%',
                        'height' => 'auto'
                    ],
                    'options' => [
                        'style' => 'height:35px;width:45%;display:inline-block;font-size:0.8em;',
                        'class' => 'text-field form-control',
                        'placeholder' => 'Капча',
                    ],
                    'template' => '{image}{input}',
                ]) ?>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'body', [
                        'inputOptions' => [
                            'class' => 'text-field form-control',
                            'placeholder' => "Напишите автору проекта"

                        ],
                        'template' => "{input}\n{hint}\n{error}",
                    ])->textArea(['rows' => 6]) ?>
                </div>
                <div class="form-group">
                    <!--                    --><? //= Html::?>
                    <?= Html::submitButton('Отправить', [
                        'id' => 'submitContact',
                        'class' => 'btn btn-sm btn-outline-inverse',
                        'name' => 'contact-button'
                    ]) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
            <? $js = <<<JAVASCRIPT
  $('#contact-form').on('beforeSubmit', function(event, jqXHR, settings) {
        var form = $(this);
        if(form.find('.has-error').length) {
            return false;
        }

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function(data) {
                console.log(data);
                $('#sendStatus').html("<div class='alert alert-success'>");
                form[0].reset();
                $('#sendStatus > .alert-success').append("<strong>Спасибо! Ваше сообщение отправлено.</strong>");
                $('#sendStatus > .alert-success').append('</div>');
                setTimeout(function() { // скрываем modal через 4 секунды
                    $('#sendStatus').html("").fadeOut(3000);
                }, 8000);

            }
        });

        return false;
    });
JAVASCRIPT;

            $this->registerJs($js, View::POS_READY);
            ?>
        </div>
        <div class="col-md-6" id="sendStatus">
        </div>
        <!-- end: CONTACT FORM -->

    </div>
    <!-- .content-wrapper -->
</article>
