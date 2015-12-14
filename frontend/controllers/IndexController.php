<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\RegForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Index controller
 */
class IndexController extends Controller
{
    public $layout = 'inner';
    
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main';
        return $this->render('main');
    }
    
//    public function actionIndex() {
//        return $this->render('index');
//    }

    public function actionRegistration() {
        $model = new TestRegistrationForm();

        if (Yii::$app->request->isGet) {
            $model->type = Yii::$app->request->get('type');
        } else if ($model->registrate()) {
            return $this->renderAjax('success', [
                        'model' => $model,
            ]);
        }

        return $this->renderAjax('registration_form', [
                    'model' => $model,
        ]);
    }

    public function actionConfirm($id) {
        Yii::$app->session->open();
        $phone = Yii::$app->session->get('phone');
        if (Yii::$app->request->isGet) {
            return $this->render('confirm_phone', [
                'phone' => $phone
            ]);            
        }
        TestRegistrationForm::sendSms($phone);
        
        
    }
}
