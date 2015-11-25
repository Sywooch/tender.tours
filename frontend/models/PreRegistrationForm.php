<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * @property string $USERNAME
 * @property string $EMAIL
 * @property integer $TYPE
 * @property string $CREATED_AT
 */
class PreRegistrationForm extends Model {

    public $name;
    public $email;
    

    public function rules() {
        return [
            [['name', 'email'], 'filter', 'filter' => 'trim'],
            [['name', 'email'], 'required'],
            ['name', 'string', 'min' => 2, 'max' => 50],
            ['email', 'email'],
            ['email', 'string', 'min' => 5, 'max' => 100],
        ];
    }

    public function preRegister() {
        
        if ($this->validate()) {
            if (User::findByUsername($this->email)) {
            $this->addError('email', 'Данный E-mail уже используется системой');
            return false;
        }
            return false;
        }
        return false; 
    }

        
//
//        if ($this->validate()) {
//            $user = new User();
//            $user->USERNAME = $this->email;
//            $user->EMAIL = $this->email;
//            $user->REGISTRATION_TOKEN = User::generareRegistrationToken();
//
//            $this->_password = Yii::$app->security->generateRandomString(8); // сгенерировать пароль [A-Za-z0-9-_] 8 символов
//
//            $user->setPassword($this->_password);
//
//            if ($user->save()) {
//                $tourist = new Tourist();
//                $tourist->USER_ID = $user->getId();
//                $tourist->NAME = $this->name;
//                $tourist->POSTED_TENDERS = 0;                
//                if ($tourist->save()) {
//                    return true;
//                }
//            }
//            return false;
//        }
//        return false;
//    }

}
