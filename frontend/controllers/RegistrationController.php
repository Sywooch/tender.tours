<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PreRegistrationForm;
use frontend\models\TouristRegForm;
use frontend\models\Tourist;
use frontend\models\AgentRegForm;
use frontend\models\Agent;
use yii\filters\AccessControl;
use frontend\models\User;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\swiftmailer\Mailer;

/**
 * RegistrationController implements the CRUD actions for RegistrationForm model.
 */
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
            }
            catch (\yii\base\Exception $e) {
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
        if (Yii::$app->request->isPost) {
            $user->TYPE = Yii::$app->request->post('type');
            if ($user->TYPE == 'tourist') {
                $user->TYPE = User::TYPE_TOURIST;
                return $this->registrateTourist($user);
            } else {
                $user->TYPE = User::TYPE_AGENT;
                return $this->registrateAgent($user);
                }
            }
        return $this->goHome();
    }

    private function registrateTourist($user) {
        $tourist = new Tourist();
        $tourist->PHONE = Yii::$app->request->post('phone');
        $tourist->USER_ID = $user->getId();
        $tourist->POSTED_TENDERS = 0;
        $tourist->validate();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($tourist->save()) {
                $transaction->commit();
                }
            else{
                throw new \yii\db\Exception('Ошибка записи пользователя в БД');
            }
        } catch (Exception $ex) {
            $transaction->rollBack();
            $tourist->addError('_error', 'Ошибка регистрации! Повторите попытку позже.');
        }
        $user->STATUS = User::STATUS_ACTIVE;
        $user->REGISTRATION_TOKEN = NULL;
        $user->save();
        if ($user->hasErrors()){
            return false;
        }
        return $this->render('tourist_cabinet');
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
                
        $agent->validate();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($agent->save()) {
                $transaction->commit();
                }
            else{
                throw new \yii\db\Exception('Ошибка записи пользователя в БД');
            }
        } catch (Exception $ex) {
            $transaction->rollBack();
            $agent->addError('_error', 'Ошибка регистрации! Повторите попытку позже.');
        }
        $user->STATUS = User::STATUS_ACTIVE;
        $user->REGISTRATION_TOKEN = NULL;
        $user->save();
        if ($user->hasErrors()){
            return false;
        }
        return $this->render('agent_cabinet');
    }

    // 7. Экшен для тенееаа
    // 7-1. Вьюшки для экшенов
    public function actionTender() {
        $model = new TenderRegForm();

        if (Yii::$app->getRequest()->isGet) {
            return $this->render('tender', [
                        'model' => $model,
            ]);
        }

        if ($model->load(['TenderRegForm' => Yii::$app->request->post()]) && $model->register()) {
            return $this->goBack();
        }
        return $this->render('tender', [
                    'model' => $model
        ]);
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
