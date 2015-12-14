<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\User;
use frontend\models\Tourist;
use frontend\models\Agent;

/**
 * @property string $USERNAME
 * @property string $EMAIL
 * @property integer $TYPE
 * @property string $CREATED_AT
 */
class TenderForm extends Model {   
    
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
    public $status;

    

    public function rules() {
        return [
            [['country_from', 'city_from', 'country_to', 'city_to', 'date_forward', 'budget', 'people_sum'], 'required'],
            [['date_back', 'stars', 'feed', 'transport'],
            ['status']]
        ];
    }

    public function attributeLabels() {
        return [
            'phone' => Yii::t('app', 'Телефон'),
        ];
    }
    
//    public function create() {
//        $this->load(['TenderForm' => Yii::$app->request->post()]);
//        
//        if (!$this->validate()) {
//            return false;
//        }
//        
//        return $this->saveTender();
//    }
    
    public function registrate() {
        echo '111';
        $this->load(['TenderForm' => Yii::$app->request->post()]);
        print_r($this);
        if (!$this->validate()) {
            return false;
        }
        
        Yii::$app->session->open();
        Yii::$app->session->set('tender', $this);
        return true;
    }
    
    public function saveTender() {
        $tender = new Tender();
        $tender->USER_ID = Yii::$app->user->id;
        $tender->COUNTRY_FROM = $this->country_from;
        $tender->CITY_FROM = $this->city_from;
        $tender->COUNTRY_TO = $this->country_to;
        $tender->CITY_TO = $this->city_to;
        $tender->DATE_FORWARD = $this->city_to;
        $tender->DATE_BACK = $this->date_back;
        $tender->STARS = $this->stars;
        $tender->PEOPLE_SUM = $this->people_sum;
        $tender->FEED = $this->feed;
        $tender->TRANSPORT = $this->transport;
        return $tender->save();
    }
}