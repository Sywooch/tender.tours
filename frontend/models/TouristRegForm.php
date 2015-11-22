<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\Connection;

/**
 * @property string $USERNAME
 * @property string $EMAIL
 * @property integer $TYPE
 * @property string $CREATED_AT
 */
class TouristRegForm extends Model {   
    
    // 2. Создать паблик свойства по таблице user_info и user
    // Только те поля, которые будут в формах регистрации (турист, агент, тендер)
    // Этих полей должно быть достаточно, чтобы заполнть таблицы user и user_info
    public $name;   // tourist
    public $email;    // user
    public $phone;  // tourist
    
    
    private $_password;
    public function getPassword() {
        return $this->_password;
    }



    // 3. Заполнить правила по паблик полям по максимуму

    public function rules() {
        return [
            [['name', 'email'], 'filter', 'filter' => 'trim'],
            [['name', 'email', 'phone'], 'required'],
            ['name', 'string', 'min' => 2, 'max' => 50],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['name', 'string', 'max' => 20],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => Yii::t('app', 'Имя'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Телефон'),
        ];
    }

    // 4. Допилить
    public function register() {
        if ($this->validate()) {

            if (User::findByUsername($this->email)) {
                $this->addError('email', 'Данный E-mail уже используется системой');
                return false;
            }

            $user = new User();
            $user->USERNAME = $this->email;
            $user->EMAIL = $this->email;
            $user->TYPE = User::TYPE_TOURIST;
            //$user->CREATED_AT = date();

            $this->_password = Yii::$app->security->generateRandomString(); // сгенерировать пароль [A-Za-z0-9-_] 8 символов

            $user->setPassword($this->_password);

            if ($user->save()) {
                $tourist = new Tourist();
                $tourist->USER_ID = $user->getId();
                $tourist->NAME = $this->name;
                $tourist->PHONE = $this->phone;
                $tourist->POSTED_TENDERS = 0;
                if ($tourist->save()) {                   
                    return true;
                }
            }
            
            return false;
        }
        return false;
    }

}
