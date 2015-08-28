<?php
/**
 * Date: 22.04.15
 * Time: 15:59
 * Project: api.legacyvoid.com
 * Developer: Alex Collin <alex@collin.su>
 *
 * Copyright by "CleverTek LLC" 2014-2015
 */

namespace api\models;

use Yii;
use yii\base\Model;
use common\models\UserIdentity as User;
use common\helpers\UserHelper;

/**
 * LoginForm is the model behind the login form.
 */
class RestLoginForm extends Model
{
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $password;

    /**
     * @var string
     */
    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            [['email'], 'filter', 'filter' => 'trim'],
            [['email'], 'filter', 'filter' => 'strtolower'],
            [['password'], 'string', 'min' => 6],
            [['password'], 'filter', 'filter' => 'trim'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', Yii::t('app', "Неправильный пароль"));

            }
        }
    }

    /**
     * Find user by [[email]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmail($this->email);
            //if(!$this->_user)
            //  $this->_user = UserHelper::createUser($this->email,$this->password);
        }
        return $this->_user;
    }


    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {

        if ($this->validate()) {
            $user = $this->getUser();
            $user->auth_key = Yii::$app->getSecurity()->generateRandomString();
            if (YII_DEBUG)
                $user->auth_key = "debug";
            $user->save();
            return Yii::$app->user->login($this->getUser());
        } else {
            return false;
        }
    }
}