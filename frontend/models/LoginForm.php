<?php

namespace frontend\models;

use Yii;
use yii\base\Model;


class LoginForm extends Model {

    public $username;
    public $password;
    
    private $_user;

    public function rules() {
        return [
            [['username', 'password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'username' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Пароль'),
        ];
    }
    
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
    
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            Yii::$app->session->open();
            Yii::$app->session->set('user', $user);
            return Yii::$app->user->login($user, 3600 * 24 * 30);
        } else {
            return false;
        }
    }

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }
}
