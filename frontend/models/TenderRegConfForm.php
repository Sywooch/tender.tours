<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\Connection;

class TenderRegConfForm extends Model {  
    public $country;
    public $date_forward;
    public $date_back;
    public $budget;
    public $stars;
    public $people_sum;

    public function rules() {
        return [
            [['country', 'date_forward', 'date_back', 'budget', 'stars', 'people_sum'], 'required'],
        ];
    }

//    public function attributeLabels() {
//        return [
//            'phone' => Yii::t('app', 'Телефон'),
//        ];
//    }
}
