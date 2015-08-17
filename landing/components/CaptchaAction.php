<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.08.15
 * Time: 14:02
 */

namespace landing\components;


class CaptchaAction extends \yii\captcha\CaptchaAction
{
    public $fontFile = "@webroot/assets/php/form_captcha/fonts/1942.ttf";
    public $foreColor = 0xFFFFFF;
    public $backColor = 0x000000;
    public $transparent = true;
    public $width = 200;
    public $padding = 0;

}