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
class AgentRegForm extends Model {
    public $company;
    public $phone;
    public $faddress;
    public $jaddress;
    public $edrpou;
    public $edrpouscan;

    public function rules() {
        return [
            [['phone', 'faddress', 'jaddress', 'edrpou', 'edrpouscan'], 'required'],
            ['phone', 'string', 'max' => 20],
        ];
    }
//
//    public function attributeLabels() {
//        return [
//            'phone' => Yii::t('app', 'Телефон'),
//        ];
//    }
}
