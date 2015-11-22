<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TouristRegForm;
use frontend\models\AgentRegForm;
use frontend\models\TenderRegForm;
use yii\filters\AccessControl;
use frontend\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;


/**
 * RegistrationController implements the CRUD actions for RegistrationForm model.
 */
class RegistrationController extends Controller {

    public $layout = 'inner';
    
    
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['agent', 'tourist', 'tender'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    
                ],
            ],
        ];
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
                && $model->register()) {
            return $this->goBack();
        }
        return $this->render('agent', [
            'model' => $model
        ]);
    }

    // 6. Экшен для туриста
    // 6-1. Вьюшки для экшенов
    public function actionTourist() {
        $model = new TouristRegForm();
        
        if (Yii::$app->getRequest()->isGet) {
            return $this->render('tourist', [
                'model' => $model,
            ]);
        }

        $transaction = Yii::$app->db->beginTransaction();
        $isError = false;
        try {
            if ($model->load(['TouristRegForm' => Yii::$app->request->post('TouristRegForm')])
                    && $model->register()) {

                // ттправка почты
                $body = $this->renderPartial('_email', [
                    'model' => $model,
                ]);
                if ($this->sendEmail($model->email, $body)) {
                    $transaction->commit();
                    // нужен редирект на страницу с подтверждением
                    return $this->goBack();
                }
                else {
                    $transaction->rollBack();
                    // нужен редирект на страницу с подтверждением
                    $model->addError('_errors', 'Не удалось отпраиить письмо!');

                    // страница для ошибка 404 в конфиге
                    // ошибка 500
                }
            }
            else {
                $transaction->rollBack();
                $isError = true;
            }
        }
        catch (\yii\db\Exception $e) {
            $transaction->rollBack();
            $isError = true;
        }
        if ($isError) {
            $this->addError('_errors', 'Произошла внутренняя ошибка!');
            //throw new Exception('Произошла внутренняя ошибка!');
            return false;
        }
        
        return $this->render('tourist', [
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
            ->setTo($email)
            ->setFrom(['my.tender.tours@gmail.com' => 'Сайт mytender.ru'])
            ->setSubject('Регистрация на сайте')
            ->setTextBody($body)
            ->send();
    }
}
