<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\User;
use frontend\models\Tourist;
use frontend\models\Agent;
use frontend\models\Tender;
use SmsC;

/**
 * @property string $USERNAME
 * @property string $EMAIL
 * @property integer $TYPE
 * @property string $CREATED_AT
 */
class TestRegistrationForm extends Model {   

    const TYPE_TOURIST = 'tourist';
    const TYPE_AGENT = 'agent';
    
    public $type = self::TYPE_TOURIST;
    public $name;
    public $email;
    public $phone;
    

    public function rules() {
        return [
            [['type', 'name', 'email', 'phone'], 'required'],
            ['email', 'email'],
            ['email', 'isUserEmailExist'],
            ['phone', 'string', 'min' => 5, 'max' => 20],
            ['type', 'in', 'range' => [self::TYPE_TOURIST, self::TYPE_AGENT]],
        ];
    }

    public function attributeLabels() {
        return [
            'phone' => Yii::t('app', 'Телефон'),
        ];
    }

    public function isUserEmailExist($attribute, $params)
    {
        if (User::isUserEmailExist($this->email)) {
            $this->addError('email', 'Данный E-mail уже используется системой');
        }
    }
    
    public function registrate() {
        $this->load(['TestRegistrationForm' => Yii::$app->request->post()]);
        
        if (!$this->validate()) {
            return false;
        }
        
        $tran = Yii::$app->db->beginTransaction();
        try {
            $user = new User();
            $user->USERNAME = $this->email;
            $user->EMAIL = $this->email;
            $user->NAME = $this->name;
            $user->generatePassword();
            $user->generateRegistrationToken();
            
            if ($this->type === self::TYPE_TOURIST) {
                $user->TYPE = User::TYPE_TOURIST;
                $userInfo = new Tourist();
                $userInfo->POSTED_TENDERS = 0;
                $userInfo->PHONE = $this->phone;
                Yii::$app->session->open();                
                Yii::$app->session->set('phone', $userInfo->PHONE);
                
            }
            else {
                $user->TYPE = User::TYPE_AGENT;
                $userInfo = new Agent();
                $userInfo->PHONE = $this->phone;
            }

            $saveResult = $user->save();
            
            $userInfo->USER_ID = $user->getPrimaryKey();
            $emailParams = [
                'model' => $this,
                'password' => $user->getRawPassword(),
                'registrationToken' => $user->REGISTRATION_TOKEN
            ];
            
            if ($saveResult && $userInfo->save() && $this->sendConfirmEmail($emailParams) && $this->confirmPhone($phone)) {
                               
                // после успешной записи юзера в БД
                // проверяем, есть ли в сессии тендер
                Yii::$app->session->open();
                if (Yii::$app->session->has('tender')) {
                    $tender = Yii::$app->session->get('tender');
                    $tender->USER_ID = $user->getPrimaryKey();
                    $tender->STATUS = 0;
                    $tender->saveTender();
                    $tran->commit();
                }

                return true;
            }
            $tran->rollBack();
        }
        catch (Exception $ex) {
            $tran->rollBack();
        }
        return false;
    }
    
    public function confirmPhone() {  
        // логика подтверждения телефона
        if (Yii::$app->request->isPost()){
            $this->sendSms();
        }

        // после успешного подтверждения телефона и записи статуса ACTIVE в БД
        // проверяем, есть ли в сессии тендер
        // если есть, сохраняем его в БД
        Yii::$app->session->open();
        if (Yii::$app->session->has('tender')) {
            $tender = Yii::$app->session->get('tender');
            $tender->saveTender();
        }
        return render('tourist_cabinet');
    }
    
    private function sendConfirmEmail($params = array()) {
        $body = Yii::$app->controller->renderPartial('confirm_email', $params);
        return $this->sendEmail($this->email, $body);
    }
    
    private function sendEmail($email, $body) {
        return Yii::$app->mailer->compose()
                        ->setFrom(['my.tender.tours@gmail.com' => 'Сайт mytender.ru'])
                        ->setTo($email)
                        ->setHtmlBody($body)
                        ->setSubject('Регистрация на сайте')
                        ->send();
    }
    
    private function sendSms($phone) {
        $smsCode = '1234';
        Yii::$app->session->open();        
        Yii::$app->session->set('smsCode', $smsCode);  
        SmsC::SEND($phone, $smsCode);
        return $smsCode;

    }

}
