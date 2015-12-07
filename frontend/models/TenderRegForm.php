<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\Connection;

class TenderRegForm extends Model {   
    
    // 2. Создать паблик свойства по таблице user_info и user
    // Только те поля, которые будут в формах регистрации (турист, агент, тендер)
    // Этих полей должно быть достаточно, чтобы заполнть таблицы user и user_info
    public $country;
    public $date_forward;
    public $date_back;
    public $budget;
    public $stars;
    public $people_sum;

    public function rules() {
        return [
            [['phone', 'faddress', 'jaddress', 'edrpou', 'edrpouscan'], 'required'],
            ['phone', 'string', 'max' => 20],
        ];
    }

    public function attributeLabels() {
        return [
            'phone' => Yii::t('app', 'Телефон'),
        ];
    }
}
