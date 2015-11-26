<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PreRegistrationForm;
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
                // нужно делать редирект на страницу с описанием дальнейших действий
                return $this->goHome();
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

    // 5. 
    // 5-1. Вьюшки для экшенов
    public function actionAgent() {
        $model = new AgentRegForm();

        if (Yii::$app->getRequest()->isGet) {
            return $this->render('agent', [
                        'model' => $model,
            ]);
        }

        if ($model->load(['AgentRegForm' => Yii::$app->request->post()]) && $model->preRegister()) {
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
                        ->setSubject('Регистрация на сайте')
                        ->setTextBody($body)
                        ->send();
    }
}
