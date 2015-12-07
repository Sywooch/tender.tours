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
    public $company;    // agent
    public $phone;  // agent
    public $faddress;  // agent
    public $jaddress;  // agent
    public $edrpou;  // agent
    public $edrpouscan;  // agent

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
