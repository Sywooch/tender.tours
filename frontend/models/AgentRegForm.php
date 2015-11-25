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
class AgentRegForm extends Model {   
    
    // 2. Создать паблик свойства по таблице user_info и user
    // Только те поля, которые будут в формах регистрации (турист, агент, тендер)
    // Этих полей должно быть достаточно, чтобы заполнть таблицы user и user_info
    public $email;    // user
    public $name;   // agent
    public $company;    // agent
    public $phone;  // agent
    public $faddress;  // agent
    public $jaddress;  // agent
    public $edrpou;  // agent
    public $edrpouscan;  // agent


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
    public function preRegister() {
        if ($this->validate()) {

            if (User::findByUsername($this->email)) {
                $this->addError('email', 'Данный E-mail уже используется системой');
                return false;
            }

            $user = new User();
            $user->USERNAME = $this->email;
            $user->EMAIL = $this->email;
            $user->TYPE = User::TYPE_AGENT;

            $this->_password = Yii::$app->security->generateRandomString(8);

            $user->setPassword($this->_password);

            if ($user->save()) {
                $agent = new Agent();
                $agent->USER_ID = $user->getId();
                $agent->NAME = $this->name;                
                $agent->COMPANY = $this->company;
                $agent->PHONE = $this->phone;
                $agent->FADDRESS = $this->faddress;
                $agent->JADDRESS = $this->jaddress;
                $agent->EDRPOU = $this->edrpou;
                $agent->EDRPOUSCAN = $this->edrpouscan;
                $agent->POSTED_FEEDBACKS = 0;
                $agent->TARIFF = 1;
                $agent->BALANCE = 0;
                if ($agent->save()) {                   
                    return true;
                }
            }            
            return false;
        }
        return false;
    }

}
