<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PreRegistrationForm;
use frontend\models\TouristRegForm;
use frontend\models\Tourist;
use frontend\models\TenderRegForm;
use frontend\models\TenderRegConfForm;
use frontend\models\Tender;
use frontend\models\AgentRegForm;
use frontend\models\Agent;
use yii\filters\AccessControl;
use frontend\models\User;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\swiftmailer\Mailer;

class RegistrationController extends Controller {

    public $layout = 'inner';

    public function actionPreRegistration() {
        // Если пришел НЕ ajax-запрос, возвращаем Not Found
        if (!Yii::$app->request->isAjax) {
            throw new \yii\web\NotFoundHttpException();
        }

        $model = new PreRegistrationForm();

        // Далее точно POST и корректные данные
        if (Yii::$app->request->isPost &&
                $model->load(['PreRegistrationForm' => Yii::$app->request->post()]) &&
                $model->validate()) {

            $user = new User();
            $user->USERNAME = $model->email;
            $user->NAME = $model->name;
            $user->EMAIL = $model->email;
            $user->generatePassword();
            $user->generateRegistrationToken();

            $transaction = Yii::$app->db->beginTransaction();
            try {
                if (!$user->save()) {
                    throw new \yii\db\Exception('Ошибка записи пользователя в БД');
                }

                $body = $this->renderPartial('_email', [
                    'model' => $model,
                    'password' => $user->getRawPassword(),
                    'registrationToken' => $user->REGISTRATION_TOKEN
                ]);
                if (!$this->sendEmail($model->email, $body)) {
                    throw new \yii\base\Exception('Не удалось отправить письмо');
                }

                $transaction->commit();
                return $this->renderPartial('_pre-reg-success');
            } catch (\yii\base\Exception $e) {
                $transaction->rollBack();
                $model->addError('_error', 'Ошибка регистрации! Повторите попытку позже.');
            }
        }

        return $this->renderPartial('_pre_registration', [
                    'model' => $model,
        ]);
    }

    public function actionRegConfirm($id) {
        $user = User::findByRegistrationToken($id);
        if ($user === null) {
            return $this->render('404');
        }
        if (Yii::$app->request->isGet) {
            return $this->render('reg-confirm', ['user' => $user]);
        }
        $userType = Yii::$app->request->post('type');
        if ($userType == 'tourist') {
            $user->TYPE = User::TYPE_TOURIST;
            return $this->registrateTourist($user);
        } else {
            $user->TYPE = User::TYPE_AGENT;
            return $this->registrateAgent($user);
        }
    }

    private function registrateTourist($user) {
        $tourist = new Tourist();
        $tourist->PHONE = Yii::$app->request->post('phone');
        $tourist->USER_ID = $user->getId();
        $tourist->POSTED_TENDERS = 0;
        
        if (!$tourist->validate()) {
            return $this->render('reg-confirm', ['user' => $user, 'model' => $tourist]);
        }
        
//        $user->STATUS = User::STATUS_ACTIVE;
//        $user->REGISTRATION_TOKEN = NULL;
        
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($tourist->save() && $user->save()) {
                $transaction->commit();
            }
            else {
                throw new \yii\db\Exception('Ошибка записи пользователя в БД');
            }
        } catch (Exception $ex) {
            $transaction->rollBack();
            $tourist->addError('_error', 'Ошибка регистрации! Повторите попытку позже.');
        }
        
        if ($tourist->hasErrors()) {
            return $this->render('reg-confirm', ['user' => $user, 'model' => $tourist]);
        }

        return $this->render('tourist_cabinet');
        // Редирект на tourist/cabinet
//        return $this->redirect(\yii\helpers\Url::to('../views/registration/tourist_cabinet'));
    }

    private function registrateAgent($user) {
        $agent = new Agent();
        $agent->USER_ID = $user->getId();
        $agent->COMPANY = Yii::$app->request->post('company');
        $agent->PHONE = Yii::$app->request->post('phone');
        $agent->FADDRESS = Yii::$app->request->post('faddress');
        $agent->JADDRESS = Yii::$app->request->post('jaddress');
        $agent->EDRPOU = Yii::$app->request->post('edrpou');
        $agent->EDRPOUSCAN = Yii::$app->request->post('edrpouscan');
        $agent->POSTED_FEEDBACKS = 0;
        $agent->TARIFF_ID = 0;
        $agent->BALANCE = 0;

        if (!$agent->validate()) {
            return $this->render('reg-confirm', ['user' => $user, 'model' => $agent]);
        }
        
        $user->STATUS = User::STATUS_ACTIVE;
        $user->REGISTRATION_TOKEN = NULL;
        
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($agent->save() && $user->save()) {
                $transaction->commit();
            }
            else {
                throw new \yii\db\Exception('Ошибка записи пользователя в БД');
            }
        } catch (Exception $ex) {
            $transaction->rollBack();
            $agent->addError('_error', 'Ошибка регистрации! Повторите попытку позже.');
        }
        
        if ($user->hasErrors()) {
            return $this->render('reg-confirm', ['user' => $user, 'model' => $agent]);
        }
        return $this->render('agent_cabinet');
    }

    public function actionTender() {
        $model = new TenderRegForm;
        $touristModel = new TouristRegForm;
        $userModel = new PreRegistrationForm;
        
        if (Yii::$app->request->isGet) {
            return $this->render('tourist-tender', ['tender' => $model, 'user' => $userModel, 'tourist' => $touristModel]);
        }
        
        
        $model->load(['TenderRegForm' => Yii::$app->request->post()]);
//        print_r($model);
        $userModel->load(['TenderRegForm' => Yii::$app->request->post()]);
        $touristModel->load(['TenderRegForm' => Yii::$app->request->post()]);

//        print_r($model);
        if (isset($_POST['fromMain']) || !$model->validate() || !$userModel->validate() || !$touristModel->validate()) {
            print_r($_POST);
            return $this->render('tourist-tender', ['tender' => $model, 'user' => $userModel, 'tourist' => $touristModel]);
        }
        
        $tender = new Tender;
        $tender->HEADER = '1111111';
        $tender->CITY = '2222';
        $tender->TRANSPORT = '3333333';
        $tender->FEED = '44444';
        $tender->COUNTRY = $model->country;
        $tender->DATE_FORWARD = $model->date_forward;
        $tender->DATE_BACK = $model->date_back;
        $tender->BUDGET = $model->budget;
        $tender->STARS = $model->stars;
        $tender->PEOPLE_SUM = $model->people_sum;
        
        $user = new User;
        $user->USERNAME = $userModel->email;
        $user->NAME = $userModel->name;
        $user->EMAIL = $userModel->email;
        $user->generatePassword();
        $user->generateRegistrationToken();
        $user->TYPE = User::TYPE_TOURIST;
        
        print_r($user);
        
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($tender->save() && $user->save()) {
                $body = $this->renderPartial('_email', [
                    'model' => $userModel,
                    'password' => $user->getRawPassword(),
                    'registrationToken' => $user->REGISTRATION_TOKEN
                ]);
                if (!$this->sendEmail($userModel->email, $body)) {
                    throw new \yii\base\Exception('Не удалось отправить письмо');
                }

                $transaction->commit();
                return $this->registrateTourist(User::findByRegistrationToken($id));
                
//                return $this->render('phone-conf');
            }
            else {
                throw new \yii\db\Exception('Ошибка записи пользователя в БД');
            }
        } catch (Exception $ex) {
            $transaction->rollBack();
            $model->addError('_error', 'Ошибка регистрации! Повторите попытку позже.');
        }
        
        return $this->render('tourist-tender', ['tender' => $model, 'user' => $userModel, 'tourist' => $tourist]);
    }

    private function sendEmail($email, $body) {
        return Yii::$app->mailer->compose()
                        ->setFrom(['my.tender.tours@gmail.com' => 'Сайт mytender.ru'])
                        ->setTo($email)
                        ->setHtmlBody($body)
                        ->setSubject('Регистрация на сайте')
                        ->send();
    }
}
