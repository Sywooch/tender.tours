<?php

namespace frontend\models;

use Yii;

/**
 * @property string $USERNAME
 * @property string $EMAIL
 * @property integer $TYPE
 * @property string $CREATED_AT
 */
class RegistrationForm extends Model {

    // 2. Создать паблик свойства по таблице user_info и user
    // Только те поля, которые будут в формах регистрации (турист, агент, тендер)
    // Этих полей должно быть достаточно, чтобы заполнть таблицы user и user_info
    public $username; // user_info
    public $email;    // user
    public $company;  // user_info
    public $phone;    // user_info
    public $faddress; // user_info
    public $jaddres;  // user_info
    public $edrpou;   // user_info

    // 3. Заполнить правила по паблик полям по максимуму

    public function rules() {
        return [
            [['username', 'email', 'company, faddress', 'jaddress'], 'filter', 'filter' => 'trim'],
            [['username', 'email'], 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\UserInfo', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This email address has already been taken.'],
            ['company', 'string', 'min' => 2, 'max' => 255],
            [['faddress', 'jaddress'], 'trim', 'string', 'length' => [50, 255]],
            ['edrpou', 'integer', 'min' => 8, 'max' => 8],
        ];
    }

    // 3-1
    /*
      public function scenarios() {

      }
     */

    public function attributeLabels() {
        return [
            'USERNAME' => Yii::t('app', 'Имя'),
            'EMAIL' => Yii::t('app', 'Email'),
        ];
    }

    // 4. Допилить
    public function register() {
        if ($this->validate()) {

            if (User::findByUsername($this->email)) {
                echo 'Данный E-mail уже используется системой';
                return false;
            }

            // Обернуть в таанаакцию
            $user = new User();
            $user->USERNAME = $this->email;
            $user->EMAIL = $this->email;
            $user->setPassword(); // допилить ф-ю гннерации
            if ($user->save()) {
                $userInfo = new UserInfo();
                $userInfo->USER_ID = $user->getId();
                $userInfo->COMPANY = $this->company;
                
                // ...
                // заполняешь остальные поля
                if ($userInfo->save()) {

                    // commit транзакции
                    return true;
                } else {
                    // rollback транзакции
                }
            } else {
                // rollback транзакции
            }
            // Или здесь добавить сообщение
            // Или здесь кинуть исключение, а в контроллере его отловить и выдать сообщение
        }
        return false;
    }

}
