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
      

    // 6. Экшен для туриста
    // 6-1. Вьюшки для экшенов
    public function actionPreRegistration() {
        if (!Yii::$app->request->isAjax)
            throw new \yii\web\NotFoundHttpException();

        $model = new PreRegistrationForm();
        $errorMessage = '';

        if (Yii::$app->request->isPost) {
            $model->load(['PreRegistrationForm' => Yii::$app->request->post()]);
            $model->validate();
            $errorMessage = '2314123412341234';            
        

            
            
            

//        $transaction = Yii::$app->db->beginTransaction();
//        $isError = false;
//        
//        try {
//            if ($model->preRregister()) {                
//                $body = $this->renderPartial('_email', [
//                    'model' => $model,                          // отправка почты
//                ]);
//                if ($this->sendEmail($model->email, $body)) {
//                    $transaction->commit();
//                    // нужен редирект на страницу с подтверждением 
//                    return $this->goBack();
//                }
//                else {
//                    $transaction->rollBack();
//                    // нужен редирект на страницу с подтверждением
//                    
//                    $model->addError('_errors', 'Не удалось отправить письмо!');
//
//                    // страница для ошибка 404 в конфиге
//                    // ошибка 500
//                }
//            }
//            else {
//                $transaction->rollBack();
//                $isError = true;
//            }
//        }
//        catch (\yii\db\Exception $e) {
//            $transaction->rollBack();
//            $isError = true;
//        }
//        if ($isError) {
//            $this->addError('_errors', 'Произошла внутренняя ошибка!');
//            //throw new Exception('Произошла внутренняя ошибка!');
//            return false;
//        }
        
        
        }
        
        return $this->renderPartial('_pre_registration', [
            'model' => $model,
            'errorMessage' => $errorMessage
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

        if ($model->load(['AgentRegForm' => Yii::$app->request->post()])
                && $model->preRegister()) {
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

        if ($model->load(['TenderRegForm' => Yii::$app->request->post()])
                && $model->register()) {
            return $this->goBack();
        }
        return $this->render('tender', [
            'model' => $model
        ]);
    }
    
    public function sendEmail($email, $body)
    {
        return Yii::$app->mailer->compose()
            ->setFrom(['my.tender.tours@gmail.com' => 'Сайт mytender.ru'])
            ->setTo($email)            
            ->setSubject('Регистрация на сайте')
            ->setTextBody($body)
            ->send();
    }
}
