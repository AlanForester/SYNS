<?php

namespace landing\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $body;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name'], 'required', 'message' => 'Введите Ваше имя'],
            [['email'], 'required', 'message' => 'Оставьте свой Email'],
            [['body'], 'required', 'message' => 'Напишите сообщение автору'],
            // email has to be a valid email address
            ['email', 'email', 'message' => 'Введите правильный Email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha', 'captchaAction'=>'default/captcha', 'message' => 'Код введен неверно'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'captcha' => 'Капча',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail()
    {
        return Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject($this->name . "<".$this->email.">")
            ->setTextBody($this->body)
            ->send();
    }
}
