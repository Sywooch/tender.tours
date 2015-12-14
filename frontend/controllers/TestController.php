<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\TestRegistrationForm;
use frontend\models\User;

class TestController extends Controller {

    public $layout = 'inner';

    public function actionIndex() {
        return $this->render('main');
    }

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
