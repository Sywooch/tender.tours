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

    public $phone;
    

    // 3. Заполнить правила по паблик полям по максимуму

    public function rules() {
        return [ 
            ['phone', 'required'],          
            ['phone', 'string', 'max' => 20],
        ];
    }

    public function attributeLabels() {
        return [
            'phone' => Yii::t('app', 'Телефон'),
        ];
    }

}
