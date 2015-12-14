<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class PreRegistrationForm extends Model {

    public $name;
    public $email;

    public function rules() {
        return [
            [['name', 'email'], 'filter', 'filter' => 'trim'],
            [['name', 'email'], 'required', 'message' => 'Поле "{attribute}" обязательно для заполнеиия'],
            ['name', 'string', 'min' => 2, 'max' => 50],
            ['email', 'email'],
            ['email', 'string', 'min' => 5, 'max' => 100],
            ['email', 'validateEmailExists']
        ];
    }
    
    public function validateEmailExists()
    {
        if (User::findByUsername($this->email)) {
            $this->addError('email', 'Данный E-mail уже используется системой');
        }
    }
}
