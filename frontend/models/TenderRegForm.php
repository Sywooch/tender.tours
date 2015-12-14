<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class TenderRegForm extends Model { 
    public $country_from;
    public $city_from;
    public $country_to;
    public $city_to;
    public $date_forward;
    public $date_back;
    public $budget;
    public $stars;
    public $people_sum;
    public $feed;
    public $transport;

    

    public function rules() {
        return [
            [['country_from', 'city_from', 'country_to', 'city_to', 'date_forward', 'budget', 'people_sum'], 'required'],
            [['date_back', 'stars', 'feed', 'transport']]
        ];
    }

//    public function attributeLabels() {
//        return [
//            'phone' => Yii::t('app', 'Телефон'),
//        ];
//    }
}
