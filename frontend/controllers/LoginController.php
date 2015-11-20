<?php

namespace frontend\controllers;

use Yii;
use frontend\models\LoginForm;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class LoginController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'logout', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction() {
        if ($this->action->id == 'index') {
            Yii::$app->controller->enableCsrfValidation = false;
        }
        return true;
    }

    public function actionIndex() {
        if (!Yii::$app->user->isGuest || Yii::$app->getRequest()->isGet) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        if ($model->load(['LoginForm' => Yii::$app->request->post()])
                && $model->login()) {
            return $this->goBack();
        }
        return $this->goHome();
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
