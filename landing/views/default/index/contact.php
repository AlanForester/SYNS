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

        <div class="contact-details col-sm-5 col-md-3">
            <p><a href="mailto:info@timeshift.in">Написать письмо </a><br>Email: info@timeshift.in</a></p>

            <p><a href="skype:live:alex_300?chat">Написать сообщение </a><br>Skype: live:alex_300</p>
        </div>
        <div class="col-sm-7 col-md-9">
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
                $('#sendStatus').html("<div class='alert alert-message'>");
                form[0].reset();
                $('#sendStatus > .alert-message').append("<strong>Спасибо! Ваше сообщение отправлено.</strong>");
                $('#sendStatus > .alert-message').append('</div>');
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
        <div class="col-sm-7 col-md-9 pull-right text-center" id="sendStatus">
        </div>
    </div>
</article>
