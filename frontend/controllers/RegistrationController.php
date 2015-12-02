<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PreRegistrationForm;
use frontend\models\TouristRegForm;
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
        // получаем юзера ($user) из таблицы по RegToken = $id
        $user = User::findByRegistrationToken($id);
        
        
        // если ничего не нашлось, кидаем HttpNotFound
        
        // если GET запрос - возвращаем форму рииистаации
        // 
        if (Yii::$app->request->isGet){
            return $this->render('reg-confirm');
        }
        // вьюшка состотт из 2 форм: для Туриста и для Агента
        // <form action="/registration/reg-confirm/REG_TOKEN"
        
        // если POST, проверяем выбаанный юзером тип
        // Если Турист - вызываешь функцию registrateTourist($user)
        // Иначе - registrateAgent($user)
        
        // если вернулся True - редирект в кабинет в зависимости от типа
        
        // здесь ретурн вьюшки 
    }
    
    private function registrateTourist($user) {
        // заполняешь модель формы Туриста
        // валиццция
        // таанзакция
        // save туриста
        // меняешь у юзера статус на Активен
        // // удалешь у юзера Рег Токен
        // save юзера
        // 
        //есии где-то ошибки, return false
        
        return true;
    }
    private function registrateAgent($user) {
        // заполняешь модель формы Агента
        // валиццция
        // таанзакция
        // save агента
        // меняешь у юзера статус на Активен
        // // удалешь у юзера Рег Токен
        // save юзера
        // 
        //есии где-то ошибки, return false
        
        return true;
    }
    
    public function actionTourist() {
        $model = new TouristRegForm;

        try {
            if (Yii::$app->getRequest()->isPost &&
                    $model->load(['TouristRegForm' => Yii::$app->request->post('TouristRegForm')]) &&
                    $model->validate()) {
                $user = User::findByRegistrationToken($user->REGISTRATION_TOKEN);
                $user->TYPE = User::TYPE_TOURIST;              
                
                if ($user->save()) {
                    $tourist = new Tourist();
                    $tourist->PHONE = $this->phone;
                    $tourist->USER_ID = $user->getId();
                    $tourist->POSTED_TENDERS = 0;
                    
                    if ($tourist->save()) {
                        return $this->renderPartial('_phoneconfirm');
                    }
                }
            }
        } catch (\yii\base\Exception $e) {
            echo $e;
        }

        return $this->renderPartial('_tourist', [
                    'model' => $model,
        ]);
    }

    // 5. 
    // 5-1. Вьюшки для экшенов
    public function actionAgent() {
        $model = new AgentRegForm();

        if (Yii::$app->getRequest()->isGet) {
            return $this->render('agent', [
                        'model' => $model,
            ]);
        }

        if ($model->load(['AgentRegForm' => Yii::$app->request->post()]) && 
                $model->register()) {
            return $this->goBack();
        }
        return $this->render('agent', [
                    'model' => $model
        ]);
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
                        ->setTextBody($body)
                        ->setSubject('Регистрация на сайте')
                        ->send();
    }
}
